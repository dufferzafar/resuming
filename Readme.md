
# resuming

Quick & Dirty (php) Application to Upload Resumes.

Started writing this at around 7:40 AM, [deployed](http://jdev.in/resuming/) it by 5 PM.

Shotouts to [@kwikadi](http://github.com/kwikadi/) for designing the frontend, mass mailing login credentials, testing the app, and helping out with other random stuff.

## what else should've been done

* reasonable nginx upload limit, it errored on an 1MB file :/
* separate nginx access/error logs for the site
* [custom nginx error pages](https://www.digitalocean.com/community/tutorials/how-to-configure-nginx-to-use-custom-error-pages-on-ubuntu-14-04) for 404, 413, 502 etc.
* google analytics link in the html code
* prevent access to the resuming directory from ssh-ing
* [bootstrap alerts](http://getbootstrap.com/components/#alerts) for success message on upload page

<!--
[Ameen tricked into thinking that this is a django app :)](http://i.imgur.com/jak3rKi.png)
[Ameen finds out that this is not a django app :(](http://i.imgur.com/n43O7ys.png)
-->
