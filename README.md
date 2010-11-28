# kohana-skins
#### Brandon R. Stoner <monokrome@monokro.me>

## What is this?

This is a small application that I use which extends the default Kohana View system to support templat skinning. When used in tandem with kohana-resources, it allows web sites to be fully reskinned without changing any URLs in the original site.

## Getting started

Skin views are placed in **application/skins/skin_name** and the skin name is standardly set to 'default'. However, this can be changed in the configuration. It is best practice to only provide skin-specific views within your skin directories, as the system will cascade if files don't exist.

For instance, if a user that prefers a skin called 'simple' was to visit a controller that loads the *index* view - the view will be searched for with the following paths:

1. application/skins/simple/index.php
2. application/skins/default/index.php
3. application/views/index.php

You can create some fairly elaborate relationships with this pattern. Allowing you to, in example, create a navigation.php view in views/ that all skins can make use of. When changing this navigation.php file, you will then be modifying all skins instead of having to modify each one separately.

