# Race Module for LyraEngine
[lyraEngine](http://lyraengine.com/)

Compatible with up to commit: 0cfc6a17f0

Adds an element of Race for players to choose during Registration. Ultimate goal would be for players to choose a Race, which comes with it's own abilities, to further submerge themselves into the realm of the RPG.

Comes with Human, Orc, Undead, and Elves by default as sample races.

This is not meant to become a fully functioning module that's production ready, but more an inspirational piece to test multiple aspects for lyraEngine development. Module Install, ACL Test, Module:Models, View-less Modules, etc.

## Installation

First you need to add to your Settings.php file:
***
 'races' => array(
        'default' => 1,
    ),
***
This adds \Config::get('races.default') to be pointed at Human. This way you can retroactively turn all Users into Human (RaceID #1). 

Go to <localhost/path>/Races when you're logged in as Root or a User with "canAdminModules" permissions.

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

###v1.0.0 Initial Release.
Installer does work, but there's too many things that need to be hardwritten (settings.php). 
There's no way to output if it was successful or not due to bug with \View::setMessage. lyraEngine may need to look into sessions for setMessages! (See issue #30).
There's no admin panel in lyraEngine so there's also no current Admin pages. Will look into this as lyraEngine moves towards that direction.