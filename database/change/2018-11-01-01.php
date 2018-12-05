<?php
    execute("UPDATE `db_version` SET `release` = `release`;
        -- 厂商数据表
        DROP TABLE IF EXISTS `company`;
        CREATE TABLE `company`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '公司ID',
            `sname`                 VARCHAR(32) NOT NULL DEFAULT ''     COMMENT '公司简称',
            `sign`                  VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '公司标识',
            `business_name`         VARCHAR(13) NOT NULL DEFAULT ''     COMMENT '业务姓名',
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
    (1, '诺能科技', 'Noonon',  '詹成辉', '13599662011', '4006551693',  '江门市诺能动物保健科技有限公司', '江门市新会区会城新会大道中42号5座'),
    (2, '浩洋生物', 'Haoyang', '黄学军', '13599662011', '07592711418', '湛江市浩洋生物科技有限公司',     '广东省湛江市麻章区金山路168号');


        -- 产品数据表
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
            `use_scope`             TEXT        NOT NULL                COMMENT '适用范围',
            `introduction`          TEXT        NOT NULL                COMMENT '产品简介',
            `use_dosage`            TEXT        NOT NULL                COMMENT '用法用量',
            `side_effect`           TEXT        NOT NULL                COMMENT '不良反应',
            `consideration`         TEXT        NOT NULL                COMMENT '注意事项',
            CONSTRAINT `pk_item` PRIMARY KEY (`id`)
        )
        COMMENT       = '产品'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `item` VALUES
        (1, '肠炎康', 'Intestinal Health', 1, '24', '200g×40包/箱', '黄色或茶色粉末。', '辣蓼、生物素、葫芦茶、高活性抗菌消炎成分等。', 
    '用于海淡水对虾、鱼、牛蛙、鲆鲽、舌鳎、甲鱼、黄鳝和鳗鱼等水产动物', 
    '健胃消食，泻热通肠。
服后能消积消胀，恢复食欲，帮助消化吸收；
凉血解毒，破积行瘀；
对多数革兰氏阳性和阴性菌、致病性弧菌等细菌有强烈抵制作用。
对细菌性肠炎、病毒性肠炎疗效极其显著；
抗病毒作用，对出血病毒作用特别明显。',
    '预防：每包本品添加 40～60 kg饲料拌匀投喂；
协助治疗：每包本品添加 20～40 kg饲料拌匀投喂，再用“杨树花原液”每瓶 (1～2亩·米水深)全池泼洒，连用二天，
第三天再用“强力乳酸菌”每瓶 (2～3亩·米水深)全池泼洒，调整肠胃。', 
    '无毒，无副作用。',
    '密封、干燥、阴凉处存放。'),

        (2, '杨树花原液', 'Poplar Flower Extract', 1, '24', '500ml×20瓶/箱', '棕黄色液体，味微苦。', '杨树花、消炎制剂。', 
    '痢疾、肠炎、泻火解毒、保肝、抗病毒、抗应激，用于鱼、虾、鳗、鳖、蟹、蛙、贝。
1、虾类：白浊、偷死、烂鳃、( 黄黑鳃 )、白斑、红体、肠炎、肝胰腺坏死。特别适用于：空肠、空胃、控防对虾偷死，解毒，抗应激。
2、鱼类：细菌、病毒、弧菌等引起的暴发病、烂鳃、出血、肠炎。
3、鳗、蟹、鳖、龟、蛙、贝、参、肠炎、肝胰脏肿大，甲壳溃烂、腐皮。', 
    '本品为植物提取制剂，依传统中医理论组方，取其原产地药材并用先进的值物提取技术精制而成。
克服了普通药物起效慢，西药耐药性和残留等问题，
对防治病毒病、细菌病、真菌弧菌、快速治疗肠炎、肝红肿、偷死、抗病毒、通肠有防治功效无残留。',
    '建议从放苗期开始使用。
1. 工业化养殖周期预防；
   拌料：每kg饲料添加 (5~6ml)；
   泼撒：每立方水体用本品 (6~8ml)，建议和本公司白便速灭每立方水体（5~8g）一齐使用，效果更佳；
2. 出现肠道问题时；
   拌料：每kg饲料添加8~10ml；
   可加量使用：配合白便速灭或肠炎康一齐使用，效果更佳；连用2~3天，每天2次。
   泼撒：每立方水体用（10~15ml）和本公司白便速灭每立方水体用（10~15g）一齐使用，连用2~3天，连用三天；病情严重时应适当加大用量。
3. 高位池及土池；拌料：每瓶本品拌（40~60kg）。
   泼撒：每瓶本品用（2~3亩·米水深）；
   可配合白便速灭每瓶（1~2亩·米水深）或肠炎康一齐使用，病情严重时可加倍使用。', 
    '无毒，无副作用。',
    '1、密封、干燥、阴凉处存放；本品若有微量沉淀，摇匀使用，不影响使用效果。
2、开封后请尽快使用，避免错过最佳使用时间。');


        -- 订单数据表
        DROP TABLE IF EXISTS `order`;
        CREATE TABLE `order`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '订单ID',
            `time`                  INTEGER     NOT NULL DEFAULT 0      COMMENT '订单时间',
            `type`                  INTEGER     NOT NULL DEFAULT 0      COMMENT '订单类型:0进货|1出货',
            `company_god`           INTEGER     NOT NULL DEFAULT 0      COMMENT '订单对象:公司|顾客ID',
            CONSTRAINT `pk_order` PRIMARY KEY (`id`)
        )
        COMMENT       = '订单'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `order` VALUES
    (1, 1543852800, 0, 1),
    (2, 1543852800, 1, 1);


        DROP TABLE IF EXISTS `buy`;
        CREATE TABLE `buy`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '进货ID',
            `order_id`              INTEGER     NOT NULL DEFAULT 0      COMMENT '订单ID',
            `item_id`               INTEGER     NOT NULL DEFAULT 0      COMMENT '产品ID',
            `production_date`       INTEGER     NOT NULL DEFAULT 0      COMMENT '生产日期',
            `buy_number`            INTEGER     NOT NULL DEFAULT 0      COMMENT '购买数量',
            `buy_price`             INTEGER     NOT NULL DEFAULT 0      COMMENT '进价',
            CONSTRAINT `pk_buy` PRIMARY KEY (`id`)
        )
        COMMENT       = '进货'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `buy` VALUES
    (1, 1, 1, 1543852800, 100, 15),
    (2, 1, 2, 1543852800, 200, 10);


        DROP TABLE IF EXISTS `sale`;
        CREATE TABLE `sale`
        (
            `id`                    INTEGER     NOT NULL AUTO_INCREMENT COMMENT '售货ID',
            `order_id`              INTEGER     NOT NULL DEFAULT 0      COMMENT '订单ID',
            `item_id`               INTEGER     NOT NULL DEFAULT 0      COMMENT '产品ID',
            `production_date`       INTEGER     NOT NULL DEFAULT 0      COMMENT '生产日期',
            `sale_number`           INTEGER     NOT NULL DEFAULT 0      COMMENT '售出数量',
            `sale_price`            INTEGER     NOT NULL DEFAULT 0      COMMENT '售价',
            CONSTRAINT `pk_sale` PRIMARY KEY (`id`)
        )
        COMMENT       = '售货'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `sale` VALUES
    (1, 2, 1, 1543852800, 10, 25),
    (2, 2, 2, 1543852800, 20, 20);


        -- 顾客表
        DROP TABLE IF EXISTS `god`;
        CREATE TABLE `god`
        (
            `id`                    BIGINT(25)  NOT NULL AUTO_INCREMENT COMMENT '玩家ID',
            `username`              VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '用户名',
            `nickname`              VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '昵称',
            `address`               VARCHAR(64) NOT NULL DEFAULT ''     COMMENT '地址',
            CONSTRAINT `pk_god` PRIMARY KEY (`id`)
        )
        COMMENT       = '顾客就是上帝'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
INSERT INTO `god` VALUES
    (1, 'ChenQiMing', '陈启明', '新社');


    ");
?>