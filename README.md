# Wordpress test

A Wordpress instance for an experiment.

Built from official [Wordpress Docker image](https://hub.docker.com/_/wordpress)

## Deploy

`bash init.bash`

Run `docker ps` to see what port Wordpress is up on.
You may have to use incognito mode when viewing the site in the browser. 

Login to the admin interface and update Wordpress to the latest version.


## Deploying on a domain

When deploying on a domain options "siteurl" and "home" have to be changed.

`docker exec -it <mysql container name> bash`

`mysql -uroot -ppass`

`USE exampledb; UPDATE wp_options SET option_value='http://www.yourdomain.com' WHERE option_name='home'OR option_name='siteurl';`

Then login to the admin interface and update Wordpress to the latest version.

