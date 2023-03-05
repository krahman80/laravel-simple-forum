# Laravel - Forum

## Entity

* users
* communities
  1. name
  2. description
  3. user_id (fk)
* topics
  1. name
  2. slug
* community_topic
  1. user_id (fk)
  2. community_id (fk)
* posts
  1. title
  2. body
  3. images
  4. url
  5. soft_deletes
* comments
  1. post_id (fk)
  2. body
* votes
  1. post_id (fk)
  2. votes
* reports

## User case

* guest can register
* guest must verify email after register
* guest can login
* user can create community
  1. when creating community user can select topics
  2. use slug when showing single community
  3. use soft_deletes
* user can create post inside community
  1. when creating post user can upload images
  2. when creating post user can add url
* user can reply his post or other user's post

## To Do

* Tabel user already provided by laravel default migration
* Add user_name to users table
* Create community model and migration
* Add field to migration 
* Create topics model
* Create community_topic table


