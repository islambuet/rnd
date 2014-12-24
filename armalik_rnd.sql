/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50534
Source Host           : 127.0.0.1:3306
Source Database       : armalik_rnd

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-12-24 15:21:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ait_system_module`
-- ----------------------------
DROP TABLE IF EXISTS `ait_system_module`;
CREATE TABLE `ait_system_module` (
  `sm_id` varchar(20) NOT NULL COMMENT 'System Module Primary ID',
  `sm_name` varchar(50) NOT NULL COMMENT 'Module Name',
  `sm_icon` varchar(20) NOT NULL COMMENT 'Module Icon',
  `sm_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Module Display Order',
  `sm_entry_date` datetime NOT NULL COMMENT 'Module Entry Date Time',
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_system_module
-- ----------------------------
INSERT INTO `ait_system_module` VALUES ('SM-000001', 'Control Panel', 'SM-000001.png', '1', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000002', 'Setup', 'SM-000002.png', '2', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000003', 'Product', 'SM-000003.png', '3', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000004', 'Payment', 'SM-000004.png', '4', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000005', 'Management', 'SM-000005.png', '5', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000006', 'Report', 'SM-000006.png', '6', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000007', 'Setup', 'SM-000002.png', '7', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000008', 'R&D Activities', 'SM-000002.png', '9', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000009', 'Trail Analysis', 'SM-000002.png', '10', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000010', 'Head Office', 'SM-000002.png', '11', '0000-00-00 00:00:00');
INSERT INTO `ait_system_module` VALUES ('SM-000011', 'General Info', 'SM-000002.png', '8', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ait_system_task`
-- ----------------------------
DROP TABLE IF EXISTS `ait_system_task`;
CREATE TABLE `ait_system_task` (
  `st_id` varchar(20) NOT NULL COMMENT 'System Task Id Primary Key',
  `st_sm_id` varchar(20) NOT NULL DEFAULT '0' COMMENT 'System Module ID Foreign Key',
  `st_icon` varchar(20) NOT NULL COMMENT 'Task Icon',
  `st_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Task Display Order',
  `st_name` varchar(100) NOT NULL COMMENT 'Task Name',
  `st_pram` varchar(150) NOT NULL DEFAULT '0' COMMENT 'System Task Parameter',
  `st_eventadd` varchar(15) NOT NULL COMMENT 'Task Add Event',
  `st_eventsave` varchar(15) DEFAULT NULL,
  `st_eventedit` varchar(15) NOT NULL COMMENT 'Task Edit Event',
  `st_eventdelete` varchar(15) NOT NULL COMMENT 'Task Delete Event',
  `st_eventview` varchar(15) NOT NULL COMMENT 'Task View Event',
  `st_eventreport` varchar(15) NOT NULL COMMENT 'Task Report Event',
  `st_entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Task Entry Date & Time',
  `st_status` varchar(15) NOT NULL DEFAULT 'Active' COMMENT 'Task Display Status',
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_system_task
-- ----------------------------
INSERT INTO `ait_system_task` VALUES ('ST-000001', 'SM-000001', 'ST-000001.png', '1', 'Modules & Task', 'Modules_Task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:17:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000002', 'SM-000001', 'ST-000002.png', '2', 'User Group', 'user_group/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:17:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000003', 'SM-000001', 'ST-000003.png', '3', 'Create User', 'user_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:17:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000004', 'SM-000002', 'ST-000004.png', '1', 'Employee', 'employee_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000005', 'SM-000002', 'ST-000005.png', '2', 'Distributor', 'distributor_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000006', 'SM-000002', 'ST-000006.png', '3', 'Dealer', 'dealer_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000007', 'SM-000002', 'ST-000007.png', '4', 'Warehouse', 'warehouse_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000008', 'SM-000002', 'ST-000008.png', '5', 'Designation', 'designation_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000009', 'SM-000002', 'ST-000009.png', '6', 'Zone', 'zone_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000010', 'SM-000002', 'ST-000010.png', '7', 'Crop', 'crop_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000011', 'SM-000002', 'ST-000011.png', '8', 'Variety', 'varriety_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-21 12:46:30', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000012', 'SM-000002', 'ST-000012.png', '9', 'Product', 'product_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000013', 'SM-000002', 'ST-000013.png', '10', 'Product Pricing', 'product_pricing/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000014', 'SM-000002', 'ST-000014.png', '11', 'Bank', 'bank_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000015', 'SM-000002', 'ST-000015.png', '12', 'Branch', 'bank_branch_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000016', 'SM-000002', 'ST-000016.png', '13', 'Territory', 'territory_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000017', 'SM-000003', '', '1', 'PO', 'product_purchase_order/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2013-12-25 05:38:40', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000018', 'SM-000003', '', '2', 'Inventory', 'product_inventory/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000019', 'SM-000003', '', '3', 'Transfer', 'product_transfer/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000020', 'SM-000002', 'ST-000020.png', '14', 'Pack Size', 'product_pack_size/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 12:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000021', 'SM-000003', '', '4', 'PO Approve', 'product_purchase_order_approve/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000022', 'SM-000003', '', '5', 'PO Delivery', 'product_purchase_order_delivery/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000023', 'SM-000003', '', '6', 'Goods Received', 'product_purchase_order_receive/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-05-19 21:16:21', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000024', 'SM-000004', '', '1', 'Credit Limit', 'distributor_credit_limit/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2013-12-26 14:14:14', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000025', 'SM-000003', '', '7', 'Special Offer', 'product_special_offer/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000026', 'SM-000003', '', '8', 'Sale', 'distributor_product_sale/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000027', 'SM-000005', '', '1', 'Weekly Tour Plan', 'weekly_tour_plan/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2013-12-28 11:03:36', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000028', 'SM-000005', '', '2', 'Add Task', 'add_task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-01 11:42:57', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000029', 'SM-000003', '', '9', 'Sale Target', 'product_sale_target/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000030', 'SM-000005', '', '3', 'Photo Gallery', 'product_photo_gallery/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000031', 'SM-000004', '', '2', 'Add Payment', 'distributor_add_payment/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000032', 'SM-000005', '', '4', 'Progress Task', 'progress_task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000033', 'SM-000002', '.png', '15', 'Product Type', 'product_type/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000034', 'SM-000001', '.png', '4', 'Change Password', 'user_change_password/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000035', 'SM-000001', '.png', '5', 'Reset Password', 'user_reset_password/list_frm.php', 'add', '', 'edit', 'delete', 'details', 'report', '2014-01-07 08:24:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000036', 'SM-000002', '.png', '16', 'Create Season', 'session_create/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-21 13:41:55', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000037', 'SM-000006', 'ST-000037.png', '1', 'Season Wise Variety Report', 'report_season_variety/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-05-31 00:59:53', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000038', 'SM-000003', '.png', '10', 'Sale Return', 'product_sale_return/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000039', 'SM-000006', '.png', '2', 'Sales Report', 'report_sale/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-07 09:58:16', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000040', 'SM-000006', '.png', '3', 'Purchase Order Report', 'report_purchase_order/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000041', 'SM-000006', '.png', '4', 'Sales Return Report', 'report_sale_return/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000042', 'SM-000006', '.png', '5', 'Credit Limit Report', 'report_credit_limit/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000043', 'SM-000006', '.png', '6', 'Current Stock Report', 'report_warehouse_current_stock/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-12 12:37:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000044', 'SM-000006', '.png', '7', 'Distributor Current Stock Report', 'report_distributor_current_stock/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-08 05:11:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000045', 'SM-000006', '.png', '8', 'Distributor Sales Report', 'report_distributor_sale/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000046', 'SM-000006', '.png', '9', 'Distributor Balance Report', 'report_distributor_balance/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000047', 'SM-000006', '.png', '10', 'Distributor Payment Report', 'report_distributor_payment/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000048', 'SM-000006', '.png', '11', 'Weekly Tour Plan Report', 'report_weekly_tour_plan/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-08 05:11:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000049', 'SM-000006', '.png', '12', 'Task Report', 'report_task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000050', 'SM-000005', '.png', '5', 'Weekly Tour Plan Progress', 'weekly_tour_plan_progress/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000051', 'SM-000006', '.png', '13', 'Invoice Print', 'report_invoice_print/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000052', 'SM-000006', '.png', '14', 'PO Delivery Status Report', 'report_po_delivery_status/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000053', 'SM-000006', '.png', '15', 'Distributor Sales in KG', 'report_distributor_sale_in_kg/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000054', 'SM-000006', '.png', '16', 'Sales in kG', 'report_sale_in_kg/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000055', 'SM-000006', '.png', '17', 'Warehouse Current Stock in KG', 'report_warehouse_current_stock_in_kg/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000056', 'SM-000002', '.png', '17', 'Division', 'division_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000057', 'SM-000004', '.png', '3', 'Payment Receipt', 'distributor_payment_recevipt/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000058', 'SM-000006', '.png', '18', 'Challan Print', 'report_challan_print/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000059', 'SM-000006', '.png', '19', 'Product Sale Target', 'report_product_sale_target/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000060', 'SM-000002', '.png', '18', 'Delete Product ', 'product_delete/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000061', 'SM-000002', '.png', '19', 'Delete PO Approve', 'product_purchase_order_approve_delete/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000062', 'SM-000002', '', '20', 'Delete PO Delivery', 'product_purchase_order_delivery_delete/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000063', 'SM-000002', '', '21', 'Delete Goods Received', 'product_purchase_order_receive_delete/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000064', 'SM-000002', '', '22', 'Farmer Info', 'farmer_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000065', 'SM-000003', '.png', '11', 'PDO Product Create', 'pdo_product_create/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000066', 'SM-000003', '.png', '12', 'Product Photo Upload', 'pdo_product_photo_upload/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-07-06 11:03:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000067', 'SM-000003', '.png', '13', 'PRI Product Review', 'pdo_product_review/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-07-17 11:33:49', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000068', 'SM-000003', '.png', '14', 'Zone Sale Target', 'product_sale_target_zone/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000069', 'SM-000006', '', '20', 'Product Sale Target (Marketing)', 'report_product_sale_target_marketing/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000070', 'SM-000002', '', '23', 'Delete Distributor Payment', 'delete_distributor_add_payment/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000071', 'SM-000003', '.png', '15', 'PDO Product View', 'pdo_product_review_view/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000072', 'SM-000007', 'ST-000072.png', '1', 'Create Crop', 'create_crop', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-09-10 17:31:15', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000073', 'SM-000007', 'ST-000073.png', '2', 'Create Type', 'create_crop_type', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-09-15 11:45:46', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000074', 'SM-000007', 'ST-000074.png', '3', 'Create Variety', 'create_crop_variety', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-09-15 11:45:48', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000075', 'SM-000007', 'ST-000074.png', '4', 'Create Principal', 'create_principal', '', null, '', '', '', '', '2014-09-16 14:58:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000076', 'SM-000007', 'ST-000074.png', '5', 'Create Fertilizer', 'create_fertilizer', '', null, '', '', '', '', '2014-09-16 14:58:30', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000077', 'SM-000007', 'ST-000074.png', '6', 'Create Pesticide & Fungicide', 'create_pesticide', '', null, '', '', '', '', '2014-09-16 14:58:44', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000078', 'SM-000007', 'ST-000074.png', '7', 'Create Plot', 'create_plot', '', null, '', '', '', '', '2014-09-16 14:58:48', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000079', 'SM-000008', 'ST-000074.png', '1', 'Plot Design', 'rnd_plot_design', '', null, '', '', '', '', '2014-09-16 16:34:40', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000080', 'SM-000008', '', '2', 'Fertiliser Requirement', 'rnd_feriliser_requirement', '', null, '', '', '', '', '2014-09-16 16:34:43', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000081', 'SM-000008', '', '3', 'Fertiliser Stock In', 'rnd_feriliser_stock_in', '', null, '', '', '', '', '2014-09-16 16:34:45', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000082', 'SM-000008', '', '4', 'Fertiliser Stock Out', 'rnd_feriliser_stock_out', '', null, '', '', '', '', '2014-09-16 16:34:47', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000083', 'SM-000008', '', '5', 'Pesticide Stock In', 'rnd_pesticide_stock_in', '', null, '', '', '', '', '2014-09-16 16:34:49', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000084', 'SM-000008', '', '6', 'Pesticide Stock Out', 'rnd_pesticide_stock_out', '', null, '', '', '', '', '2014-09-16 16:34:52', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000085', 'SM-000008', '', '7', 'Labour Activities', 'rnd_labour_activities', '', null, '', '', '', '', '2014-09-16 16:34:54', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000086', 'SM-000009', '', '1', '15 Day\'s Picture Intervel - Fortnightly', 'trail_fiftyfive_fortnighly_report', '', null, '', '', '', '', '2014-09-17 12:55:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000087', 'SM-000009', '', '2', '15 Day\'s Picture Report', 'trail_fiftyfive_picture_report', '', null, '', '', '', '', '2014-09-17 14:13:53', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000088', 'SM-000009', '', '3', 'Flower/Curd Report', 'trail_flower_curd_report', '', null, '', '', '', '', '2014-09-17 12:56:37', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000089', 'SM-000009', '', '4', 'Flowering Picture Report', 'trail_flower_picture_report', '', null, '', '', '', '', '2014-09-17 12:56:53', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000090', 'SM-000009', '', '5', 'Disease Report', 'trail_disease_report', '', null, '', '', '', '', '2014-09-17 12:57:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000091', 'SM-000009', '', '6', 'Fruit/Curd Report', 'trail_fruid_curd_report', '', null, '', '', '', '', '2014-09-17 12:59:15', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000092', 'SM-000009', '', '7', 'Fruit/Curd Picture Report', 'trail_fruid_curd_picture_report', '', null, '', '', '', '', '2014-09-17 12:59:17', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000093', 'SM-000009', '', '8', 'First and Last Harvesting Report', 'trail_harvesting_report', '', null, '', '', '', '', '2014-09-17 12:59:19', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000094', 'SM-000010', '', '1', 'Crop Classification', 'hofc_crop_classification', '', null, '', '', '', '', '2014-09-17 13:00:37', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000095', 'SM-000010', '', '2', 'Sample Local Procurement', 'hofc_sample_local_procurement', '', null, '', '', '', '', '2014-09-17 13:01:09', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000096', 'SM-000010', '', '3', 'Sample Principal Procurement', 'hofc_principal_procurement', '', null, '', '', '', '', '2014-09-17 13:01:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000097', 'SM-000011', '', '1', 'Sample Delivery Date', 'general_sample_delivery', '', null, '', '', '', '', '2014-09-17 16:05:04', 'Active');

-- ----------------------------
-- Table structure for `ait_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `ait_user_group`;
CREATE TABLE `ait_user_group` (
  `ug_rowid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key Auto ID',
  `ug_id` varchar(15) NOT NULL COMMENT 'Group ID Primary Key',
  `ug_name` varchar(100) NOT NULL COMMENT 'Group Name',
  `up_sm_id` varchar(15) NOT NULL COMMENT 'System Module ID  Foreign Key',
  `up_st_id` varchar(15) NOT NULL COMMENT 'System Task ID  Foreign Key',
  `up_eventadd` varchar(15) NOT NULL COMMENT 'Task Add Event',
  `up_eventsave` varchar(15) DEFAULT NULL,
  `up_eventedit` varchar(15) NOT NULL COMMENT 'Task Edit Event',
  `up_eventdelete` varchar(15) NOT NULL COMMENT 'Task Delete Event',
  `up_eventview` varchar(15) NOT NULL COMMENT 'Task View Event',
  `up_eventreport` varchar(15) NOT NULL COMMENT 'Task Report Event',
  `up_confidentiality` varchar(25) NOT NULL COMMENT 'Data Confidentiality Level',
  `ug_entry_date` datetime NOT NULL COMMENT 'Uger Group Entry Date Time',
  PRIMARY KEY (`ug_rowid`),
  KEY `up_sm_id` (`up_sm_id`),
  KEY `up_st_id` (`up_st_id`),
  KEY `ug_id` (`ug_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11173 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_user_group
-- ----------------------------
INSERT INTO `ait_user_group` VALUES ('9147', 'UG-000006', 'Admin', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9148', 'UG-000006', 'Admin', 'SM-000002', 'ST-000004', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9149', 'UG-000006', 'Admin', 'SM-000002', 'ST-000005', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9150', 'UG-000006', 'Admin', 'SM-000002', 'ST-000006', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9151', 'UG-000006', 'Admin', 'SM-000002', 'ST-000007', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9152', 'UG-000006', 'Admin', 'SM-000002', 'ST-000009', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9153', 'UG-000006', 'Admin', 'SM-000002', 'ST-000010', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9154', 'UG-000006', 'Admin', 'SM-000002', 'ST-000011', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9155', 'UG-000006', 'Admin', 'SM-000002', 'ST-000012', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9156', 'UG-000006', 'Admin', 'SM-000002', 'ST-000013', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9157', 'UG-000006', 'Admin', 'SM-000002', 'ST-000016', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9158', 'UG-000006', 'Admin', 'SM-000002', 'ST-000020', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9159', 'UG-000006', 'Admin', 'SM-000002', 'ST-000033', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9160', 'UG-000006', 'Admin', 'SM-000002', 'ST-000036', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9161', 'UG-000006', 'Admin', 'SM-000003', 'ST-000017', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9162', 'UG-000006', 'Admin', 'SM-000003', 'ST-000021', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9163', 'UG-000006', 'Admin', 'SM-000003', 'ST-000025', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9164', 'UG-000006', 'Admin', 'SM-000003', 'ST-000029', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9165', 'UG-000006', 'Admin', 'SM-000004', 'ST-000024', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9166', 'UG-000006', 'Admin', 'SM-000005', 'ST-000027', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9167', 'UG-000006', 'Admin', 'SM-000005', 'ST-000028', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9168', 'UG-000006', 'Admin', 'SM-000005', 'ST-000032', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9169', 'UG-000006', 'Admin', 'SM-000005', 'ST-000050', '', '', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9170', 'UG-000006', 'Admin', 'SM-000006', 'ST-000037', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9171', 'UG-000006', 'Admin', 'SM-000006', 'ST-000039', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9172', 'UG-000006', 'Admin', 'SM-000006', 'ST-000040', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9173', 'UG-000006', 'Admin', 'SM-000006', 'ST-000041', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9174', 'UG-000006', 'Admin', 'SM-000006', 'ST-000042', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9175', 'UG-000006', 'Admin', 'SM-000006', 'ST-000043', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9176', 'UG-000006', 'Admin', 'SM-000006', 'ST-000044', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9177', 'UG-000006', 'Admin', 'SM-000006', 'ST-000045', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9178', 'UG-000006', 'Admin', 'SM-000006', 'ST-000046', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9179', 'UG-000006', 'Admin', 'SM-000006', 'ST-000047', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9180', 'UG-000006', 'Admin', 'SM-000006', 'ST-000048', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9181', 'UG-000006', 'Admin', 'SM-000006', 'ST-000049', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9182', 'UG-000006', 'Admin', 'SM-000006', 'ST-000051', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9183', 'UG-000006', 'Admin', 'SM-000006', 'ST-000052', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9184', 'UG-000006', 'Admin', 'SM-000006', 'ST-000053', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9185', 'UG-000006', 'Admin', 'SM-000006', 'ST-000054', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9186', 'UG-000006', 'Admin', 'SM-000006', 'ST-000055', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9506', 'UG-000007', 'Exicutive', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9507', 'UG-000007', 'Exicutive', 'SM-000002', 'ST-000005', 'add', 'save', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9508', 'UG-000007', 'Exicutive', 'SM-000002', 'ST-000006', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9509', 'UG-000007', 'Exicutive', 'SM-000002', 'ST-000009', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9510', 'UG-000007', 'Exicutive', 'SM-000002', 'ST-000016', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9859', 'UG-000003', 'Destributor', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9860', 'UG-000003', 'Destributor', 'SM-000002', 'ST-000006', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9861', 'UG-000003', 'Destributor', 'SM-000003', 'ST-000017', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9862', 'UG-000003', 'Destributor', 'SM-000003', 'ST-000023', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9863', 'UG-000003', 'Destributor', 'SM-000003', 'ST-000026', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9864', 'UG-000003', 'Destributor', 'SM-000003', 'ST-000038', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9865', 'UG-000003', 'Destributor', 'SM-000004', 'ST-000031', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9866', 'UG-000003', 'Destributor', 'SM-000005', 'ST-000027', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9867', 'UG-000003', 'Destributor', 'SM-000005', 'ST-000032', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9868', 'UG-000003', 'Destributor', 'SM-000005', 'ST-000050', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9869', 'UG-000003', 'Destributor', 'SM-000006', 'ST-000040', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9870', 'UG-000003', 'Destributor', 'SM-000006', 'ST-000041', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9871', 'UG-000003', 'Destributor', 'SM-000006', 'ST-000044', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9872', 'UG-000003', 'Destributor', 'SM-000006', 'ST-000045', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9873', 'UG-000003', 'Destributor', 'SM-000006', 'ST-000046', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9874', 'UG-000003', 'Destributor', 'SM-000006', 'ST-000047', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9980', 'UG-000002', 'Warehouse', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9981', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000010', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9982', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000011', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9983', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000012', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9984', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000013', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9985', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000020', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9986', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000033', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9987', 'UG-000002', 'Warehouse', 'SM-000002', 'ST-000036', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9988', 'UG-000002', 'Warehouse', 'SM-000003', 'ST-000018', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9989', 'UG-000002', 'Warehouse', 'SM-000003', 'ST-000019', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9990', 'UG-000002', 'Warehouse', 'SM-000003', 'ST-000022', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9991', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000037', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9992', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000039', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9993', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000040', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9994', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000041', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9995', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000043', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9996', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000051', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9997', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000055', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('9998', 'UG-000002', 'Warehouse', 'SM-000006', 'ST-000058', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10198', 'UG-000004', 'Marketing', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10199', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000005', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10200', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000006', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10201', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000009', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10202', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000014', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10203', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000015', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10204', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000016', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10205', 'UG-000004', 'Marketing', 'SM-000002', 'ST-000056', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10206', 'UG-000004', 'Marketing', 'SM-000003', 'ST-000021', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10207', 'UG-000004', 'Marketing', 'SM-000003', 'ST-000025', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10208', 'UG-000004', 'Marketing', 'SM-000003', 'ST-000068', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10209', 'UG-000004', 'Marketing', 'SM-000004', 'ST-000024', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10210', 'UG-000004', 'Marketing', 'SM-000005', 'ST-000028', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10211', 'UG-000004', 'Marketing', 'SM-000005', 'ST-000032', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10212', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000037', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10213', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000039', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10214', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000040', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10215', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000041', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10216', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000042', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10217', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000043', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10218', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000044', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10219', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000045', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10220', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000046', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10221', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000047', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10222', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000048', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10223', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000049', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10224', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000051', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10225', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000052', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10226', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000053', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10227', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000054', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10228', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000055', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10229', 'UG-000004', 'Marketing', 'SM-000006', 'ST-000069', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10379', 'UG-000005', 'IT Executive', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10380', 'UG-000005', 'IT Executive', 'SM-000001', 'ST-000035', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10381', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000004', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10382', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000005', 'add', 'save', '', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10383', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000006', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10384', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000007', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10385', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000009', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10386', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000010', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10387', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000011', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10388', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000012', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10389', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000014', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10390', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000015', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10391', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000016', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10392', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000020', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10393', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000033', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10394', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000056', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10395', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000060', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10396', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000061', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10397', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000062', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10398', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000063', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10399', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000064', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10400', 'UG-000005', 'IT Executive', 'SM-000002', 'ST-000070', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10401', 'UG-000005', 'IT Executive', 'SM-000003', 'ST-000065', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10402', 'UG-000005', 'IT Executive', 'SM-000003', 'ST-000066', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10403', 'UG-000005', 'IT Executive', 'SM-000003', 'ST-000067', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10406', 'UG-000010', 'Product Recharge Incharge', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10407', 'UG-000010', 'Product Recharge Incharge', 'SM-000003', 'ST-000067', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10411', 'UG-000009', 'Product Development Officer', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10412', 'UG-000009', 'Product Development Officer', 'SM-000002', 'ST-000064', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10413', 'UG-000009', 'Product Development Officer', 'SM-000003', 'ST-000066', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10414', 'UG-000009', 'Product Development Officer', 'SM-000003', 'ST-000071', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10488', 'UG-000011', 'PDO Product Creator', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10489', 'UG-000011', 'PDO Product Creator', 'SM-000002', 'ST-000064', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10490', 'UG-000011', 'PDO Product Creator', 'SM-000003', 'ST-000065', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10491', 'UG-000008', 'Zonal Head Office', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10492', 'UG-000008', 'Zonal Head Office', 'SM-000003', 'ST-000017', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10493', 'UG-000008', 'Zonal Head Office', 'SM-000003', 'ST-000029', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10494', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000039', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10495', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000040', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10496', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000041', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10497', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000044', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10498', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000045', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10499', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000046', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10500', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000047', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10501', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000054', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('10502', 'UG-000008', 'Zonal Head Office', 'SM-000006', 'ST-000069', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11076', 'UG-000001', 'Administrator', 'SM-000001', 'ST-000001', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11077', 'UG-000001', 'Administrator', 'SM-000001', 'ST-000002', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11078', 'UG-000001', 'Administrator', 'SM-000001', 'ST-000003', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11079', 'UG-000001', 'Administrator', 'SM-000001', 'ST-000034', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11080', 'UG-000001', 'Administrator', 'SM-000001', 'ST-000035', 'add', '', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11081', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000004', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11082', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000005', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11083', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000006', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11084', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000007', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11085', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000008', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11086', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000009', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11087', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000010', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11088', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000011', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11089', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000012', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11090', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000013', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11091', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000014', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11092', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000015', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11093', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000016', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11094', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000020', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11095', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000033', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11096', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000036', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11097', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000056', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11098', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000060', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11099', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000061', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11100', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000062', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11101', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000063', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11102', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000064', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11103', 'UG-000001', 'Administrator', 'SM-000002', 'ST-000070', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11104', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000017', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11105', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000018', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11106', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000019', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11107', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000021', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11108', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000022', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11109', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000023', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11110', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000025', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11111', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000026', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11112', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000029', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11113', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000038', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11114', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000065', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11115', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000066', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11116', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000067', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11117', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000068', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11118', 'UG-000001', 'Administrator', 'SM-000003', 'ST-000071', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11119', 'UG-000001', 'Administrator', 'SM-000004', 'ST-000024', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11120', 'UG-000001', 'Administrator', 'SM-000004', 'ST-000031', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11121', 'UG-000001', 'Administrator', 'SM-000004', 'ST-000057', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11122', 'UG-000001', 'Administrator', 'SM-000005', 'ST-000027', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11123', 'UG-000001', 'Administrator', 'SM-000005', 'ST-000028', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11124', 'UG-000001', 'Administrator', 'SM-000005', 'ST-000030', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11125', 'UG-000001', 'Administrator', 'SM-000005', 'ST-000032', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11126', 'UG-000001', 'Administrator', 'SM-000005', 'ST-000050', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11127', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000037', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11128', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000039', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11129', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000040', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11130', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000041', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11131', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000042', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11132', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000043', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11133', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000044', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11134', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000045', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11135', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000046', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11136', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000047', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11137', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000048', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11138', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000049', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11139', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000051', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11140', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000052', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11141', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000053', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11142', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000054', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11143', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000055', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11144', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000058', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11145', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000059', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11146', 'UG-000001', 'Administrator', 'SM-000006', 'ST-000069', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11147', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000072', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11148', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000073', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11149', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000074', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11150', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000075', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11151', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000076', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11152', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000077', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11153', 'UG-000001', 'Administrator', 'SM-000007', 'ST-000078', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11154', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000079', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11155', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000080', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11156', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000081', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11157', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000082', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11158', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000083', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11159', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000084', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11160', 'UG-000001', 'Administrator', 'SM-000008', 'ST-000085', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11161', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000086', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11162', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000087', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11163', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000088', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11164', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000089', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11165', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000090', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11166', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000091', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11167', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000092', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11168', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000093', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11169', 'UG-000001', 'Administrator', 'SM-000010', 'ST-000094', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11170', 'UG-000001', 'Administrator', 'SM-000010', 'ST-000095', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11171', 'UG-000001', 'Administrator', 'SM-000010', 'ST-000096', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11172', 'UG-000001', 'Administrator', 'SM-000011', 'ST-000097', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ait_user_login`
-- ----------------------------
DROP TABLE IF EXISTS `ait_user_login`;
CREATE TABLE `ait_user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `employee_id` varchar(20) DEFAULT NULL,
  `employee_name` varchar(200) DEFAULT NULL,
  `user_level` varchar(100) NOT NULL COMMENT 'Employee Pirmary key',
  `division_id` varchar(20) NOT NULL,
  `zone_id` varchar(20) DEFAULT NULL,
  `territory_id` varchar(20) DEFAULT NULL,
  `warehouse_id` varchar(20) DEFAULT NULL,
  `user_group_id` varchar(20) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_pass` text,
  `user_tmp_pass` varchar(20) DEFAULT NULL,
  `tmp_pass_status` int(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user_expire_date` date DEFAULT NULL,
  `user_status` varchar(10) DEFAULT NULL COMMENT 'Active, Inactive',
  `del_status` int(1) NOT NULL,
  `user_photo` varchar(50) DEFAULT NULL,
  `entry_by` varchar(20) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_user_login
-- ----------------------------
INSERT INTO `ait_user_login` VALUES ('1', 'UI-000001', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '0', '', '', '', 'UG-000001', 'super', 'ee96ba35751a964c34782fc0930952c0', null, '0', '2014-05-27 17:13:12', null, 'Active', '0', '31120701.jpg', null, null);
INSERT INTO `ait_user_login` VALUES ('17', 'UI-000002', 'EI-000019', 'Thanvir Salim Noor', 'Warehouse', '0', '', '', 'WI-000001', 'UG-000002', '0012', '68d9fcdfcf651453c37583179cbb2fcd', null, '0', '2014-06-02 06:24:16', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('18', 'UI-000003', 'EI-000020', 'Md. Sanowar Hossain', 'Marketing', '0', '', '', '', 'UG-000005', 'sanowar', '5fb552d46349660d5f1bb19a5589748b', null, '0', '2014-09-02 09:41:02', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('19', 'UI-000004', 'EI-000021', 'Md. Tariqul Islam', 'Marketing', '0', '', '', '', 'UG-000007', '0017', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('20', 'UI-000005', 'EI-000027', 'Dr. Arif Matin ', 'Marketing', '0', '', '', '', 'UG-000006', '009', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-06-05 21:30:17', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('21', 'UI-000006', 'EI-000018', 'A.K.M Shahidul Islam', 'Marketing', '0', '', '', '', 'UG-000004', '0010', '1bdc02582eb52f39d541e8f48ee569f7', null, '0', '2014-09-11 08:53:16', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('22', 'UI-000007', 'EI-000006', 'Md. Nazmul Kabir', 'Zone', '0', 'ZI-000005', '', '', 'UG-000003', '0060', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('23', 'UI-000008', 'EI-000064', 'Siddique Bazaar', 'Warehouse', '0', '', '', 'WI-000003', 'UG-000002', 'siddique_bazar ', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('24', 'UI-000009', 'EI-000065', 'Rangpur', 'Warehouse', '0', '', '', 'WI-000002', 'UG-000002', 'rangpur', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('25', 'UI-000010', 'EI-000023', 'Md. Zakir Hossain', 'Division', 'DI-000001', '', '', '', 'UG-000008', '0018', '3a648655fda348301400125166e79568', null, '0', '2014-07-10 11:47:23', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('26', 'UI-000011', 'EI-000015', 'Md. Abdus Samad', 'Zone', '0', 'ZI-000009', '', '', 'UG-000003', '0050', '3a648655fda348301400125166e79568', null, '0', '2014-08-11 19:51:17', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('27', 'UI-000012', 'EI-000066', 'Md. Mojnur Rahman', 'Division', 'DI-000002', '', '', '', 'UG-000008', '0027', '49f0c5d6f2b3c882e6a37dad50de2999', null, '0', '2014-07-10 11:47:30', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('28', 'UI-000013', 'EI-000007', 'Md. Mustafizar Rahman', 'Zone', '0', 'ZI-000007', '', '', 'UG-000003', '0057', '363776a769d5e837d28b47600a6c8ed1', null, '0', '2014-07-07 13:20:44', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('29', 'UI-000014', 'EI-000008', 'Md. Alimuzzaman (Babu)', 'Zone', '0', 'ZI-000008', '', '', 'UG-000003', '0054', '94be9d736a54c18efce6263b9446039e', null, '0', '2014-06-30 01:02:12', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('30', 'UI-000015', 'EI-000011', 'Md. Rezaul Karim', 'Zone', '0', 'ZI-000011', '', '', 'UG-000003', '0052', 'cfb7d7cddaf723a3efea4aaad9b04dc2', null, '0', '2014-06-22 14:51:21', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('31', 'UI-000016', 'EI-000009', 'Md. Abdul Alim', 'Zone', '0', 'ZI-000010', '', '', 'UG-000003', '0056', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('32', 'UI-000017', 'EI-000013', 'Md. Harun-Or-Rashid', 'Zone', '0', 'ZI-000006', '', '', 'UG-000003', '0055', '416106893283dbf1de5deca26a0e0806', null, '0', '2014-07-07 18:25:05', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('33', 'UI-000018', 'EI-000067', 'S.M Sarowar Hossain', 'Zone', '0', 'ZI-000004', '', '', 'UG-000003', '0068', '49f0c5d6f2b3c882e6a37dad50de2999', null, '0', '2014-08-21 09:35:03', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('34', 'UI-000019', 'EI-000012', 'A.R.M Roknuzzaman Prodhan', 'Zone', '0', 'ZI-000003', '', '', 'UG-000003', '0053', 'ee8081f4b95cfa6ae0010f5976ef80c6', null, '0', '2014-06-24 23:42:27', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('35', 'UI-000020', 'EI-000010', 'Md. Abdul hai', 'Zone', '0', 'ZI-000002', '', '', 'UG-000003', '0051', 'd010520096297a86347279e997b542c7', null, '0', '2014-06-24 21:32:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('36', 'UI-000021', 'EI-000072', 'Md. Zakir Hossain', 'Zone', '0', 'ZI-000001', '', '', 'UG-000003', '0064', '3a648655fda348301400125166e79568', null, '0', '2014-06-17 11:26:03', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('37', 'UI-000022', 'EI-000005', ' Prantosh Kumar', 'Marketing', '', '', '', '', 'UG-000009', '0061', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('38', 'UI-000023', 'EI-000004', 'Md. Fazlul Karim', 'Marketing', '', '', '', '', 'UG-000009', '0063', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('39', 'UI-000024', 'EI-000003', 'Md. Iklash Hussain', 'Marketing', '', '', '', '', 'UG-000009', '0065', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('40', 'UI-000025', 'EI-000002', 'Md. Shafiur Rahman', 'Marketing', '', '', '', '', 'UG-000009', '0066', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('41', 'UI-000026', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '', '', '', '', 'UG-000009', '0067', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('42', 'UI-000027', 'EI-000060', 'Sumon Sarker', 'Marketing', '', '', '', '', 'UG-000009', '0042', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('43', 'UI-000028', 'EI-000071', 'Swarup Podder', 'Marketing', '', '', '', '', 'UG-000010', '0080', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('44', 'UI-000029', 'EI-000069', 'Md. Arefur Rahman', 'Marketing', '', '', '', '', 'UG-000010', '0081', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('45', 'UI-000030', 'EI-000022', 'Md. Abidur Rahman', 'Marketing', '', '', '', '', 'UG-000011', '0026', '145066a3eac722fc69fdc1c0d769cd39', null, '0', '2014-08-11 16:41:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('46', 'UI-000031', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '', '', '', '', 'UG-000011', 'pdo', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('47', 'UI-000032', 'EI-000078', 'Md. Hadiuzzaman', 'Marketing', '', '', '', '', 'UG-000010', '0083', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('48', 'UI-000033', 'EI-000079', 'Md. Asraf Khan', 'Zone', '', 'ZI-000009', '', '', 'UG-000003', '0069', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);

-- ----------------------------
-- Table structure for `rnd_crop_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_crop_info`;
CREATE TABLE `rnd_crop_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `crop_name` varchar(50) DEFAULT NULL,
  `crop_code` varchar(20) DEFAULT NULL,
  `crop_height` int(11) DEFAULT NULL,
  `crop_width` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  KEY `created_by_2` (`created_by`),
  KEY `modified_by_2` (`modified_by`),
  KEY `created_by_3` (`created_by`),
  KEY `modified_by_3` (`modified_by`),
  KEY `created_by_4` (`created_by`),
  KEY `modified_by_4` (`modified_by`),
  KEY `created_by_5` (`created_by`),
  KEY `modified_by_5` (`modified_by`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_crop_info
-- ----------------------------
INSERT INTO `rnd_crop_info` VALUES ('3', 'Cucumber', 'C0001', '46', '23', '0', 'UI-000001', '1419337772', 'UI-000001', '1419399879');
INSERT INTO `rnd_crop_info` VALUES ('4', 'Brinjal', 'B0001', '654', '344', '0', 'UI-000001', '1419342256', 'UI-000001', '1419400013');
INSERT INTO `rnd_crop_info` VALUES ('5', 'Potato', 'P0001', '82', '41', '1', 'UI-000001', '1419342385', null, null);

-- ----------------------------
-- Table structure for `rnd_disease_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_disease_info`;
CREATE TABLE `rnd_disease_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rnd_code_id` int(10) DEFAULT NULL,
  `disease_part` int(1) DEFAULT NULL,
  `disease_image_url` varchar(20) DEFAULT NULL,
  `remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `rnd_code_id` (`rnd_code_id`),
  CONSTRAINT `rnd_disease_info_ibfk_1` FOREIGN KEY (`rnd_code_id`) REFERENCES `rnd_variety_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_disease_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fertilizer_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fertilizer_info`;
CREATE TABLE `rnd_fertilizer_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fertilizer_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fertilizer_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fertilizer_requirement_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fertilizer_requirement_info`;
CREATE TABLE `rnd_fertilizer_requirement_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fertilizer_id` int(10) DEFAULT NULL,
  `requirement_date` int(11) DEFAULT NULL,
  `seed_bed_id` int(10) DEFAULT NULL,
  `requirement_type` int(1) NOT NULL,
  `plot_id` int(10) DEFAULT NULL,
  `plot_row_id` int(10) DEFAULT NULL,
  `fertilizer_quantity` double(5,2) DEFAULT NULL,
  `fertilizer_price` double(11,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fertilizer_id` (`fertilizer_id`),
  KEY `seed_bed_id` (`seed_bed_id`),
  KEY `plot_id` (`plot_id`),
  KEY `plot_row_id` (`plot_row_id`),
  CONSTRAINT `rnd_fertilizer_requirement_info_ibfk_1` FOREIGN KEY (`fertilizer_id`) REFERENCES `rnd_fertilizer_info` (`id`),
  CONSTRAINT `rnd_fertilizer_requirement_info_ibfk_2` FOREIGN KEY (`seed_bed_id`) REFERENCES `rnd_seed_bed_info` (`id`),
  CONSTRAINT `rnd_fertilizer_requirement_info_ibfk_3` FOREIGN KEY (`plot_id`) REFERENCES `rnd_plot_info` (`id`),
  CONSTRAINT `rnd_fertilizer_requirement_info_ibfk_4` FOREIGN KEY (`plot_row_id`) REFERENCES `rnd_plot_row_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fertilizer_requirement_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fertilizer_stock_in`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fertilizer_stock_in`;
CREATE TABLE `rnd_fertilizer_stock_in` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fertilizer_id` int(10) DEFAULT NULL,
  `fertilizer_quantity` double(6,2) NOT NULL,
  `fertilizer_price` decimal(12,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fertilizer_id` (`fertilizer_id`),
  CONSTRAINT `rnd_fertilizer_stock_in_ibfk_1` FOREIGN KEY (`fertilizer_id`) REFERENCES `rnd_fertilizer_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fertilizer_stock_in
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fertilizer_stock_out`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fertilizer_stock_out`;
CREATE TABLE `rnd_fertilizer_stock_out` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fertilizer_id` int(10) DEFAULT NULL,
  `seed_bed_id` int(10) DEFAULT NULL,
  `fertilizer_quantity` double(6,2) NOT NULL,
  `fertilizer_price` double(12,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fertilizer_id` (`fertilizer_id`),
  CONSTRAINT `rnd_fertilizer_stock_out_ibfk_1` FOREIGN KEY (`fertilizer_id`) REFERENCES `rnd_fertilizer_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fertilizer_stock_out
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fifteendays_interval_picture`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fifteendays_interval_picture`;
CREATE TABLE `rnd_fifteendays_interval_picture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rnd_code_id` int(50) DEFAULT NULL,
  `picture_day` varchar(20) DEFAULT NULL,
  `picture_url` varchar(50) DEFAULT NULL,
  `remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `rnd_code_id` (`rnd_code_id`),
  CONSTRAINT `rnd_fifteendays_interval_picture_ibfk_1` FOREIGN KEY (`rnd_code_id`) REFERENCES `rnd_variety_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fifteendays_interval_picture
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_first_last_harvesting_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_first_last_harvesting_report`;
CREATE TABLE `rnd_first_last_harvesting_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rnd_code_id` int(10) DEFAULT NULL,
  `initial_plants_during_trial_start` varchar(20) DEFAULT NULL,
  `harvesting_date` int(11) DEFAULT NULL,
  `no_of_plants_harvested` int(6) NOT NULL,
  `no_of_fruits` int(6) DEFAULT NULL,
  `total_market` int(6) DEFAULT NULL,
  `total_market_weight` double(6,2) NOT NULL,
  `uniformity` double(6,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_first_last_harvesting_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_flowering_picture_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_flowering_picture_report`;
CREATE TABLE `rnd_flowering_picture_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rnd_code_id` int(10) DEFAULT NULL,
  `first_flowering_pic` varchar(20) DEFAULT NULL,
  `first_flowering_remark` text,
  `fifty_flowering_pic` varchar(20) DEFAULT NULL,
  `fifty_flowering_remark` text,
  `first_setting_pic` varchar(20) DEFAULT NULL,
  `first_setting_remark` text,
  `first_harvested_pic` varchar(20) DEFAULT NULL,
  `first_harvested_remark` text,
  `last_harvested_pic` varchar(20) DEFAULT NULL,
  `last_harvested_remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `rnd_code_id` (`rnd_code_id`),
  CONSTRAINT `rnd_flowering_picture_report_ibfk_1` FOREIGN KEY (`rnd_code_id`) REFERENCES `rnd_variety_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_flowering_picture_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_flowering_type_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_flowering_type_info`;
CREATE TABLE `rnd_flowering_type_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `flowering_type` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_flowering_type_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_flower_curd_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_flower_curd_report`;
CREATE TABLE `rnd_flower_curd_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fertilizer_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_flower_curd_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fortnightly_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fortnightly_report`;
CREATE TABLE `rnd_fortnightly_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rnd_code_id` int(10) DEFAULT NULL,
  `sowing_date` int(11) DEFAULT NULL,
  `transplanting_date` int(11) DEFAULT NULL,
  `initial_plants_during_trial_start` int(10) DEFAULT NULL,
  `fortnightly_reporting_date` int(11) DEFAULT NULL,
  `plant_type` int(1) DEFAULT NULL,
  `plant_uniformity` int(1) DEFAULT NULL,
  `distance_from_ground_curd` int(1) DEFAULT NULL,
  `crud_type` int(1) DEFAULT NULL,
  `crud_color` int(1) DEFAULT NULL,
  `crud_compactness` int(1) DEFAULT NULL,
  `crud_uniformity` int(1) DEFAULT NULL,
  `disease_severity` int(1) DEFAULT NULL,
  `special_characters_status` int(1) DEFAULT NULL,
  `accepted_status` int(1) DEFAULT NULL,
  `special_characters` text,
  `remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `rnd_code_id` (`rnd_code_id`),
  CONSTRAINT `rnd_fortnightly_report_ibfk_1` FOREIGN KEY (`rnd_code_id`) REFERENCES `rnd_variety_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fortnightly_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_fruit_curd_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_fruit_curd_report`;
CREATE TABLE `rnd_fruit_curd_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rnd_code_id` int(10) DEFAULT NULL,
  `curd_type` int(1) DEFAULT NULL,
  `curd_color` int(1) DEFAULT NULL,
  `curd_weight` double(6,2) DEFAULT NULL,
  `curd_diameter` double(6,2) DEFAULT NULL,
  `curd_height` double(6,2) DEFAULT NULL,
  `curd_compactness` varchar(150) DEFAULT NULL,
  `keeping_quality` varchar(150) DEFAULT NULL,
  `special_characters` varchar(150) DEFAULT NULL,
  `remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `rnd_code_id` (`rnd_code_id`),
  CONSTRAINT `rnd_fruit_curd_report_ibfk_1` FOREIGN KEY (`rnd_code_id`) REFERENCES `rnd_variety_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_fruit_curd_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_labor_activity_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_labor_activity_info`;
CREATE TABLE `rnd_labor_activity_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `crop_id` int(10) DEFAULT NULL,
  `labor_activity_name_id` int(10) DEFAULT NULL,
  `activity_date` int(11) DEFAULT NULL,
  `number_of_labor` int(10) DEFAULT NULL,
  `remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `crop_id` (`crop_id`),
  KEY `labor_activity_name_id` (`labor_activity_name_id`),
  CONSTRAINT `rnd_labor_activity_info_ibfk_1` FOREIGN KEY (`crop_id`) REFERENCES `rnd_crop_info` (`id`),
  CONSTRAINT `rnd_labor_activity_info_ibfk_2` FOREIGN KEY (`labor_activity_name_id`) REFERENCES `rnd_labor_activity_name` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_labor_activity_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_labor_activity_name`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_labor_activity_name`;
CREATE TABLE `rnd_labor_activity_name` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `labor_activity_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_labor_activity_name
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_pesticide_fungicide_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_pesticide_fungicide_info`;
CREATE TABLE `rnd_pesticide_fungicide_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pesticide_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_pesticide_fungicide_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_plot_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_plot_info`;
CREATE TABLE `rnd_plot_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plot_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_plot_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_plot_row_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_plot_row_info`;
CREATE TABLE `rnd_plot_row_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plot_row` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_plot_row_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_principal_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_principal_info`;
CREATE TABLE `rnd_principal_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `principal_name` varchar(50) DEFAULT NULL,
  `principal_code` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  KEY `created_by_2` (`created_by`),
  KEY `modified_by_2` (`modified_by`),
  KEY `created_by_3` (`created_by`),
  KEY `modified_by_3` (`modified_by`),
  KEY `created_by_4` (`created_by`),
  KEY `modified_by_4` (`modified_by`),
  KEY `created_by_5` (`created_by`),
  KEY `modified_by_5` (`modified_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_principal_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_product_type_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_product_type_info`;
CREATE TABLE `rnd_product_type_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `crop_id` int(10) DEFAULT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `product_type_code` varchar(20) DEFAULT NULL,
  `product_type_height` int(11) DEFAULT NULL,
  `product_type_width` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `crop_id` (`crop_id`),
  CONSTRAINT `rnd_product_type_info_ibfk_1` FOREIGN KEY (`crop_id`) REFERENCES `rnd_crop_info` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_product_type_info
-- ----------------------------
INSERT INTO `rnd_product_type_info` VALUES ('1', '4', 'Type11', 'Code11', '231', '451', '1', 'UI-000001', '1419405999', 'UI-000001', '1419409332');
INSERT INTO `rnd_product_type_info` VALUES ('2', '5', 'Type2', 'Code2', '89', '45', '1', 'UI-000001', '1419406090', null, null);
INSERT INTO `rnd_product_type_info` VALUES ('3', '3', 'Type3', 'Code3', '43', '12', '1', 'UI-000001', '1419406111', null, null);

-- ----------------------------
-- Table structure for `rnd_sample_delivery_date`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_sample_delivery_date`;
CREATE TABLE `rnd_sample_delivery_date` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `season_id` int(10) DEFAULT NULL,
  `destined_delivery_date` int(11) DEFAULT NULL,
  `delivered_status` int(1) NOT NULL,
  `delivery_date` int(11) DEFAULT NULL,
  `received_status` int(1) NOT NULL,
  `rnd_received_date` int(11) DEFAULT NULL,
  `destined_sowing_date` int(11) DEFAULT NULL,
  `sowing_status` int(1) NOT NULL,
  `sowing_date` int(11) DEFAULT NULL,
  `remark` text,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `season_id` (`season_id`),
  CONSTRAINT `rnd_sample_delivery_date_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `rnd_season_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_sample_delivery_date
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_sample_delivery_date_crop`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_sample_delivery_date_crop`;
CREATE TABLE `rnd_sample_delivery_date_crop` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sample_delivery_date_id` int(10) DEFAULT NULL,
  `crop_id` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `sample_delivery_date_id` (`sample_delivery_date_id`),
  KEY `crop_id` (`crop_id`),
  CONSTRAINT `rnd_sample_delivery_date_crop_ibfk_1` FOREIGN KEY (`sample_delivery_date_id`) REFERENCES `rnd_sample_delivery_date` (`id`),
  CONSTRAINT `rnd_sample_delivery_date_crop_ibfk_2` FOREIGN KEY (`crop_id`) REFERENCES `rnd_crop_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_sample_delivery_date_crop
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_season_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_season_info`;
CREATE TABLE `rnd_season_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `season_name` varchar(50) DEFAULT NULL,
  `season_start` varchar(20) DEFAULT NULL,
  `season_end` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_season_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_seed_bed_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_seed_bed_info`;
CREATE TABLE `rnd_seed_bed_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seed_bed` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_seed_bed_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_trial_setup_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_trial_setup_info`;
CREATE TABLE `rnd_trial_setup_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `season_id` int(10) DEFAULT NULL,
  `rnd_code` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `season_id` (`season_id`),
  KEY `rnd_code` (`rnd_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_trial_setup_info
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_variety_info`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_variety_info`;
CREATE TABLE `rnd_variety_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `principal_id` int(10) DEFAULT NULL,
  `flowering_type_id` int(10) DEFAULT NULL,
  `season_id` int(10) NOT NULL,
  `crop_id` int(10) DEFAULT NULL,
  `product_type_id` int(10) DEFAULT NULL,
  `variety_name` varchar(50) DEFAULT NULL,
  `variety_type` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `creation_date` int(11) DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `flowering_type_id` (`flowering_type_id`),
  KEY `season_id` (`season_id`),
  KEY `product_type_id` (`product_type_id`),
  KEY `principal_id` (`principal_id`) USING BTREE,
  KEY `crop_id` (`crop_id`) USING BTREE,
  CONSTRAINT `rnd_variety_info_ibfk_1` FOREIGN KEY (`principal_id`) REFERENCES `rnd_principal_info` (`id`),
  CONSTRAINT `rnd_variety_info_ibfk_2` FOREIGN KEY (`flowering_type_id`) REFERENCES `rnd_flowering_type_info` (`id`),
  CONSTRAINT `rnd_variety_info_ibfk_3` FOREIGN KEY (`crop_id`) REFERENCES `rnd_crop_info` (`id`),
  CONSTRAINT `rnd_variety_info_ibfk_4` FOREIGN KEY (`product_type_id`) REFERENCES `rnd_product_type_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rnd_variety_info
-- ----------------------------
