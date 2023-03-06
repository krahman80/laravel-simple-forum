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
  2. validate community before inserting into database
* user can update his community
  1. validate community before updating community
* user can view single community
  1. use slug when showing single community
* user can delete his own community
  1. use soft_deletes when deleting community
* user can create post inside community
  1. when creating post user can upload images
  2. when creating post user can add url
* user can reply his post or other user's post

## To Do

* save community


