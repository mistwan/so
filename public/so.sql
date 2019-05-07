CREATE DATABASE `so`;
USE so;

CREATE TABLE `so_category`(
  cat_id INT PRIMARY KEY AUTO_INCREMENT,
  cat_name VARCHAR(32) NOT NULL,
  cat_desc VARCHAR(128) NOT NULL,
  parent_id INT,
  status INT NOT NULL DEFAULT 0,
  topic_count INT,
  article_count INT,
  create_time VARCHAR(32),
  update_time VARCHAR(32),
  delete_time VARCHAR(32)
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_topic(
  topic_id INT(5) PRIMARY KEY AUTO_INCREMENT,
  topic_title VARCHAR(64),
  topic_desc VARCHAR(128),
  user_id INT(5),
  status INT NOT NULL DEFAULT 0,
  article_count INT,
  create_time VARCHAR(32),
  update_time VARCHAR(32),
  delete_time VARCHAR(32)
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_article(
  article_id INT(5) PRIMARY KEY AUTO_INCREMENT,
  article_logo VARCHAR(128),
  article_title VARCHAR(128),
  article_desc VARCHAR(128),
  article_content TEXT,
  discuss_count INT(5),
  view_count INT,
  user_id INT(5) DEFAULT 0,
  cat_id INT DEFAULT 0,
  topic_id INT DEFAULT 0,
  status INT NOT NULL DEFAULT 0,
  agree_count INT,
  create_time VARCHAR(32),
  update_time VARCHAR(32),
  delete_time VARCHAR(32)
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_user(
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(32) UNIQUE,
  password VARCHAR(64) UNIQUE,
  email VARCHAR(64),
  phone VARCHAR(13),
  is_active INT NOT NULL DEFAULT 0,
  user_pic VARCHAR(128),
  activate_code VARCHAR(64),
  status INT NOT NULL DEFAULT 0,
  register_time VARCHAR(32),
  update_time VARCHAR(32),
  delete_time VARCHAR(32)
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_user_topic(
  ut_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  topic_id INT
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_message(
  id INT PRIMARY KEY AUTO_INCREMENT,
  phone VARCHAR(13),
  code VARCHAR(10),
  send_time INT
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_reply(
  reply_id INT PRIMARY KEY AUTO_INCREMENT,
  reply_content TEXT,
  user_id INT,
  question_id INT,
  agree_count INT,
  disagree_count INT,
  parent_id INT,
  reply_time INT
)ENGINE myisam DEFAULT charset utf8;

CREATE TABLE so_pick(
id INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(128) NOT NULL,
CONTENT TEXT
)ENGINE myisam DEFAULT charset utf8;
