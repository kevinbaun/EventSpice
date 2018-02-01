(function() {
  $(function() {
    var circleDrawHandler, clearMarkers, earthRadii, map, markers, polygonDestructionHandler, searchBox, searchInput, updateURL;



    map = new google.maps.Map($('#map')[0], {
      zoom: 6,
      center: new google.maps.LatLng(35.7796, -78.6382),
      mapType: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true,
      mapTypeControl: true,
      zoomControl: true,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.TOP_RIGHT
      },
      zoomControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
      }
    });



	var event1 = new google.maps.Marker({
          position: {lat: 39.2904, lng: -76.6122},
          map: map,
          title: 'Event1'
        });
	var event2 = new google.maps.Marker({
          position: {lat: 38.9072, lng: -77.0369},
          map: map,
          title: 'Event2'
        });
	var event3 = new google.maps.Marker({
          position: {lat: 37.5407, lng: -77.4360},
          map: map,
          title: 'Event3'
        });

    markers = [event1, event2, event3];




    earthRadii = {
      mi: 3963.1676,
      km: 6378.1,
      ft: 20925524.9,
      mt: 6378100,
      "in": 251106299,
      yd: 6975174.98,
      fa: 3487587.49,
      na: 3443.89849,
      ch: 317053.408,
      rd: 1268213.63,
      fr: 31705.3408
    };
    polygonDestructionHandler = function() {
      return this.setMap(null);
    };
    clearMarkers = function() {
      var i, len, m;
      for (i = 0, len = markers.length; i < len; i++) {
        m = markers[i];
        m.setMap(null);
      }
      return markers = [];
    };
    circleDrawHandler = function(e) {
      var circle, radius, select, unitKey;
      select = $('#unitSelector');
      unitKey = $('option', select).eq(select[0].selectedIndex).val();
      radius = parseFloat(document.getElementById('radiusInput').value);
      radius = (radius / earthRadii[unitKey]) * earthRadii['mt'];
      circle = new google.maps.Circle({
        center: e.latLng,
        clickable: true,
        draggable: false,
        editable: false,
        fillColor: '#004de8',
        fillOpacity: 0.27,
        map: map,
        radius: radius,
        strokeColor: '#004de8',
        strokeOpacity: 0.62,
        strokeWeight: 1
      });

      google.maps.event.addListener(circle, 'rightclick', polygonDestructionHandler);

      return circle ; //google.maps.event.addListener(circle, 'click', circleDrawHandler);
    };

	drawAndSearch = function(e) {
		c = circleDrawHandler(e);
		findMarkers(c);
	}

	findMarkers = function( circle ){
		var msg = "";
		markers.forEach(function (m){
			if (google.maps.geometry.spherical.computeDistanceBetween(m.getPosition(), circle.getCenter()) <= circle.getRadius()) {
				msg += m.getTitle()+' => is in your search area. <a href="#" onclick="alert(\'demo\');">html test</a>';
			} else {
				// msg += m.getName()+'=> is NOT in circle');
			}
			msg +="<br/>";
		});
		document.getElementById("your_events").innerHTML = msg;
	}

    google.maps.event.addListener(map, 'click', drawAndSearch);
    searchInput = document.getElementById('searchInput');
    $(searchInput.form).on({
      submit: function() {
        return false;
      }
    });
    searchBox = new google.maps.places.SearchBox(searchInput);
    google.maps.event.addListener(searchBox, 'places_changed', function() {

      /* When a place is selected, center on it */
      var location;
      // clearMarkers();
      location = searchBox.getPlaces()[0];
      if (location != null) {
        if (location.geometry.viewport != null) {
          map.fitBounds(location.geometry.viewport);
          map.panToBounds(location.geometry.viewport);
        } else {
          map.setCenter(location.geometry.location);
        }
        markers.push(new google.maps.Marker({
          position: location.geometry.location,
          map: map,
          title: location.name,
          clickable: false
        }));
      }
    });
    updateURL = function() {
      var center, params, ref, u;
      center = map.getCenter();
      params = {
        lat: _.round(center.lat(), 6).toString(),
        lng: _.round(center.lng(), 6).toString(),
        z: map.getZoom().toString(),
        u: $('#unitSelector').val(),
        r: $('#radiusInput').val()
      };
      if (!params.r) {
        delete params['r'];
      }
      u = new URI();
      u.setQuery(params);
      return (ref = window.history) != null ? typeof ref.replaceState === "function" ? ref.replaceState(null, null, u.toString()) : void 0 : void 0;
    };
    google.maps.event.addListener(map, 'bounds_changed', _.debounce(updateURL, 200));
    google.maps.event.addListener(map, 'zoom_changed', updateURL);
    $('#unitSelector, #radiusInput').on('change', updateURL);
    return $(window).on('hashchange', function(e) {
      var center, center_, newCenter, query, z;
      query = (new URI()).query(true);
      center_ = map.getCenter();
      center = [center_.lat(), center_.lng()];
      newCenter = [center[0], center[1]];
      if (query.lat != null) {
        newCenter[0] = parseFloat(query.lat);
      }
      if (query.lng != null) {
        newCenter[1] = parseFloat(query.lng);
      }
      if ($.grep(newCenter, isNaN).length === 0) {
        map.setCenter({
          lat: newCenter[0],
          lng: newCenter[1]
        });
      }
      if (query.z != null) {
        z = parseInt(query.z, 10);
        if (!isNaN(z)) {
          map.setZoom(z);
        }
      }
      if (query.r != null) {
        $('#radiusInput').val(query.r);
      }
      if (query.u != null) {
        return $('#unitSelector').val(query.u);
      }
    }).triggerHandler('hashchange');
  });

}).call(this);

//

//# sourceMappingURL=app.js.map
