<?php
    execute("UPDATE `db_version` SET `release` = '';
        -- 模版数据表
        DROP TABLE IF EXISTS `constant`;
        CREATE TABLE `constant`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `cname`                 VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '中文名称',
            `sign`                  VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '标识',
            `data`                  FLOAT       NOT NULL DEFAULT 0      COMMENT '数值',
            CONSTRAINT `pk_constant` PRIMARY KEY (`id`)
        )
        COMMENT       = '常量'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';


        -- 厂商数据表
        DROP TABLE IF EXISTS `company`;
        CREATE TABLE `company`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '公司ID',
            `sname`                 VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '公司简称',
            `sign`                  VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '公司标识',
            `business_phone`        VARCHAR(13) NOT NULL DEFAULT ''     COMMENT '业务电话',
            `servicer_phone`        VARCHAR(13) NOT NULL DEFAULT ''     COMMENT '服务热线',
            `full_name`             VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '公司全称',
            `address`               VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '公司地址',
            CONSTRAINT `pk_company` PRIMARY KEY (`id`)
        )
        COMMENT       = '公司'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `company` VALUES
    (1, '诺能科技', 'Noonon', '15859680951', '4006551693', '江门市诺能动物保健科技有限公司', '江门市新会区会城新会大道中42号5座');


        DROP TABLE IF EXISTS `item`;
        CREATE TABLE `item`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '产品ID',
            `name`                  VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '产品名称',
            `sign`                  VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '产品标识',
            `company_id`            INTEGER     NOT NULL DEFAULT 0      COMMENT '公司ID',
            `guarantee_period`      INTEGER     NOT NULL DEFAULT 0      COMMENT '有效期(个月)',
            `specification`         VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '包装规格',
            `character`             VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '产品性状',
            `component`             VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '主要成份',
            `use_scope`             INTEGER     NOT NULL DEFAULT 0      COMMENT '适用范围',
            `introduction`          INTEGER     NOT NULL DEFAULT 0      COMMENT '产品简介',
            `use_dosage`            INTEGER     NOT NULL DEFAULT 0      COMMENT '用法用量',
            `side_effect`           INTEGER     NOT NULL DEFAULT 0      COMMENT '不良反应',
            CONSTRAINT `pk_item` PRIMARY KEY (`id`)
        )
        COMMENT       = '产品'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `item` VALUES
        (1, '肠炎康', 'Intestinal Health', '1', '24', '200g×40包/箱', '黄色或茶色粉末', '辣蓼、生物素、葫芦茶、高活性抗菌消炎成分等。', 
    '用于海淡水对虾、鱼、牛蛙、鲆鲽、舌鳎、甲鱼、黄鳝和鳗鱼等水产动物', 
    '健胃消食，泻热通肠。
服后能消积消胀，恢复食欲，帮助消化吸收；
凉血解毒，破积行瘀；
对多数革兰氏阳性和阴性菌、致病性弧菌等细菌有强烈抵制作用。
对细菌性肠炎、病毒性肠炎疗效极其显著；
抗病毒作用，对出血病毒作用特别明显',
    '预防：每包本品添加 40～60 kg饲料拌匀投喂；
协助治疗：每包本品添加 20～40 kg饲料拌匀投喂，再用“杨树花原液”每瓶 (1～2亩·米水深)全池泼洒，连用二天，
第三天再用“强力乳酸菌”每瓶 (2～3亩·米水深)全池泼洒，调整肠胃。', 
    '无毒，无副作用。');


        DROP TABLE IF EXISTS `buy`;
        CREATE TABLE `buy`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '进货订单ID',
            `buy_time`              VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '进货时间',
            `item_id`               VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '产品ID',
            `production_date`       VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '产品生产日期',
            `buy_number`            VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '数量',
            `buy_price`             VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '进价',
            CONSTRAINT `pk_buy` PRIMARY KEY (`id`)
        )
        COMMENT       = '进货'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';


        DROP TABLE IF EXISTS `sale`;
        CREATE TABLE `sale`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '售货订单ID',
            `sale_time`             VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '售货时间',
            `item_id`               VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '产品ID',
            `production_date`       VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '产品生产日期',
            `sale_number`           VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '数量',
            `sale_price`            VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '售价',
            CONSTRAINT `pk_sale` PRIMARY KEY (`id`)
        )
        COMMENT       = '售货'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';


        -- 顾客表
        DROP TABLE IF EXISTS `god`;
        CREATE TABLE `god`
        (
            `id`                    BIGINT(25)  NOT NULL AUTO_INCREMENT COMMENT '玩家ID',
            `username`              VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '用户名',
            `nickname`              VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '昵称',
            `vip_level`             INTEGER     NOT NULL DEFAULT 0      COMMENT 'vip等级',
            `disable_login`         INTEGER     NOT NULL DEFAULT 0      COMMENT '屏蔽截止时间',
            `disable_talk`          INTEGER     NOT NULL DEFAULT 0      COMMENT '禁言截止时间',
            `is_tester`             INTEGER     NOT NULL DEFAULT 0      COMMENT '是否是测试号',
            `regdate`               INTEGER     NOT NULL DEFAULT 0      COMMENT '注册时间',
            `test_disable`          INTEGER     NOT NULL DEFAULT 0      COMMENT '是否因为测试号被封号 0否 1是',
            `disable_type`          INTEGER     NOT NULL DEFAULT 0      COMMENT '封号类型',
            `server_id`             INTEGER     NOT NULL DEFAULT 0      COMMENT '服务器ID',
            CONSTRAINT `pk_god` PRIMARY KEY (`id`)
        )
        COMMENT       = '顾客就是上帝'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';


        -- 顾客数据表
        DROP TABLE IF EXISTS `god_data`;
        CREATE TABLE `god_data`
        (
            `god_id`             BIGINT(25)  NOT NULL                COMMENT '玩家ID',
            `ingot`                 INTEGER     NOT NULL DEFAULT 0      COMMENT '金币',
            `charge_ingot`          INTEGER     NOT NULL DEFAULT 0      COMMENT '充值金币',
            `coins`                 INTEGER     NOT NULL DEFAULT 0      COMMENT '铜钱',
            CONSTRAINT `pk_god_data` PRIMARY KEY (`god_id`)
        )
        COMMENT       = '顾客就是上帝'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
    ");
?>