SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


-- ----------------------------
-- 分类-铭文表
-- ----------------------------
DROP TABLE IF EXISTS king_inscription;
CREATE TABLE king_inscription
(
    id          int(10) unsigned        NOT NULL AUTO_INCREMENT,
    parentId    int(10) unsigned        DEFAULT NULL,
    type        tinyint(1)              NOT NULL DEFAULT 0 COMMENT '分类层级',
    name        varchar(24)             NOT NULL COMMENT '名称',
    description varchar(1000)           DEFAULT NULL COMMENT '描述',
    info        varchar(1000)           DEFAULT NULL COMMENT 'JSON字符串信息',
    PRIMARY KEY (id),
    UNIQUE KEY name_type (name,type)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- 分类-出装表
-- ----------------------------
DROP TABLE IF EXISTS king_outfit;
CREATE TABLE king_outfit
(
    id          int(10) unsigned        NOT NULL AUTO_INCREMENT,
    parentId    int(10) unsigned        DEFAULT NULL,
    type        tinyint(1)              NOT NULL DEFAULT 0 COMMENT '分类层级',
    name        varchar(24)             NOT NULL COMMENT '名称',
    description varchar(1000)           DEFAULT NULL COMMENT '描述',
    info        varchar(1000)           DEFAULT NULL COMMENT 'JSON字符串信息',
    PRIMARY KEY (id),
    UNIQUE KEY name_type (name,type)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- 分类-英雄表
-- ----------------------------
DROP TABLE IF EXISTS king_hero;
CREATE TABLE king_hero
(
    id          int(10) unsigned        NOT NULL AUTO_INCREMENT,
    parentId    int(10) unsigned        DEFAULT NULL,
    type        tinyint(1)              NOT NULL DEFAULT 0 COMMENT '分类层级',
    name        varchar(24)             NOT NULL COMMENT '名称',
    description varchar(1000)           DEFAULT NULL COMMENT '描述',
    info        varchar(1000)           DEFAULT NULL COMMENT 'JSON字符串信息',
    PRIMARY KEY (id),
    UNIQUE KEY name_type (name,type)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;
