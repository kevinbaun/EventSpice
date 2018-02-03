# EventSpice

The event manager is an open source attempt to unify the collection methods and data presentation of events within the Society of Creative Anachronism (SCA). This application is in no way associated with SCA corporate or any particular Kingdom within the SCA. 

DEMO SITE: https://eventspice.houseblueheron.com/ 
... you will get an SSL warning. I know. It's expected. Just ignore it for now. 


GOALS
- clean, consistent, easy to use system
- environment agnostic

Features
- event submission
- event editing for identified users
- email notifications
- event location mapping (google maps)
- map tools (distance to event, events near me, etc)

What am I NOT building in?
- Too much in the way of security. The UserSpice baseline gives us some generic security and I'll provide some info on using oAuth. Beyond that you're kinda on your own. I'm happy to help you get something working but EVERYBODY does things differently on that front, so I am not focus on that at this time. 

Someday I'll get around to building integration examples for various auth/auth systems. First, functionality. 

A note about Databases:
- I am going to use MySQL because it's handy. 
- I am providing schema info, I am not your DBA. 
- If you need help transitioning to PostgreSQL, Oracle, Derby, whatever, I will be happy to assist you. 
- If you need help transitioning to MongoDB, Redis, Couch, or other NoSQL DBs you're on your own. Ain't nobody got time for that. 

Although I despise Debian, I have decided to use the bitnami LAMP image for this development initiative. If nothing else it's consistent. This code can easily be transitioned to most other LAMP-like environments. https://bitnami.com/stack/lamp

Licensed under the 'Please give me credit as the designer and developer' code. Feel free to hack it up any way that works for you. 

This system uses (UserSpice) https://userspice.com/ because I'm lazy and it's kind of awesome.
