/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50534
Source Host           : 127.0.0.1:3306
Source Database       : armalik_rnd

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2015-02-21 02:04:34
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
INSERT INTO `ait_system_module` VALUES ('SM-000012', 'R & D Reports', '', '0', '0000-00-00 00:00:00');

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
INSERT INTO `ait_system_task` VALUES ('ST-000001', 'SM-000001', 'ST-000001.png', '1', 'Modules & Task', 'Modules_Task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:17:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000002', 'SM-000001', 'ST-000002.png', '2', 'User Group', 'user_group/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:17:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000003', 'SM-000001', 'ST-000003.png', '3', 'Create User', 'user_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:17:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000004', 'SM-000002', 'ST-000004.png', '1', 'Employee', 'employee_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000005', 'SM-000002', 'ST-000005.png', '2', 'Distributor', 'distributor_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000006', 'SM-000002', 'ST-000006.png', '3', 'Dealer', 'dealer_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000007', 'SM-000002', 'ST-000007.png', '4', 'Warehouse', 'warehouse_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000008', 'SM-000002', 'ST-000008.png', '5', 'Designation', 'designation_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000009', 'SM-000002', 'ST-000009.png', '6', 'Zone', 'zone_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000010', 'SM-000002', 'ST-000010.png', '7', 'Crop', 'crop_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000011', 'SM-000002', 'ST-000011.png', '8', 'Variety', 'varriety_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-22 18:46:30', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000012', 'SM-000002', 'ST-000012.png', '9', 'Product', 'product_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000013', 'SM-000002', 'ST-000013.png', '10', 'Product Pricing', 'product_pricing/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:33', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000014', 'SM-000002', 'ST-000014.png', '11', 'Bank', 'bank_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000015', 'SM-000002', 'ST-000015.png', '12', 'Branch', 'bank_branch_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000016', 'SM-000002', 'ST-000016.png', '13', 'Territory', 'territory_info/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000017', 'SM-000003', '', '1', 'PO', 'product_purchase_order/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2013-12-26 14:38:40', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000018', 'SM-000003', '', '2', 'Inventory', 'product_inventory/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000019', 'SM-000003', '', '3', 'Transfer', 'product_transfer/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000020', 'SM-000002', 'ST-000020.png', '14', 'Pack Size', 'product_pack_size/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-03 21:45:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000021', 'SM-000003', '', '4', 'PO Approve', 'product_purchase_order_approve/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000022', 'SM-000003', '', '5', 'PO Delivery', 'product_purchase_order_delivery/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000023', 'SM-000003', '', '6', 'Goods Received', 'product_purchase_order_receive/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-05-21 03:16:21', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000024', 'SM-000004', '', '1', 'Credit Limit', 'distributor_credit_limit/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2013-12-27 23:14:14', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000025', 'SM-000003', '', '7', 'Special Offer', 'product_special_offer/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000026', 'SM-000003', '', '8', 'Sale', 'distributor_product_sale/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000027', 'SM-000005', '', '1', 'Weekly Tour Plan', 'weekly_tour_plan/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2013-12-29 20:03:36', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000028', 'SM-000005', '', '2', 'Add Task', 'add_task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-01-02 20:42:57', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000029', 'SM-000003', '', '9', 'Sale Target', 'product_sale_target/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000030', 'SM-000005', '', '3', 'Photo Gallery', 'product_photo_gallery/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000031', 'SM-000004', '', '2', 'Add Payment', 'distributor_add_payment/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000032', 'SM-000005', '', '4', 'Progress Task', 'progress_task/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000033', 'SM-000002', '.png', '15', 'Product Type', 'product_type/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000034', 'SM-000001', '.png', '4', 'Change Password', 'user_change_password/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000035', 'SM-000001', '.png', '5', 'Reset Password', 'user_reset_password/list_frm.php', 'add', '', 'edit', 'delete', 'details', 'report', '2014-01-08 17:24:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000036', 'SM-000002', '.png', '16', 'Create Season', 'session_create/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-22 19:41:55', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000037', 'SM-000006', 'ST-000037.png', '1', 'Season Wise Variety Report', 'report_season_variety/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-06-01 06:59:53', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000038', 'SM-000003', '.png', '10', 'Sale Return', 'product_sale_return/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000039', 'SM-000006', '.png', '2', 'Sales Report', 'report_sale/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-08 18:58:16', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000040', 'SM-000006', '.png', '3', 'Purchase Order Report', 'report_purchase_order/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000041', 'SM-000006', '.png', '4', 'Sales Return Report', 'report_sale_return/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000042', 'SM-000006', '.png', '5', 'Credit Limit Report', 'report_credit_limit/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000043', 'SM-000006', '.png', '6', 'Current Stock Report', 'report_warehouse_current_stock/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-13 18:37:34', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000044', 'SM-000006', '.png', '7', 'Distributor Current Stock Report', 'report_distributor_current_stock/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-09 13:11:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000045', 'SM-000006', '.png', '8', 'Distributor Sales Report', 'report_distributor_sale/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000046', 'SM-000006', '.png', '9', 'Distributor Balance Report', 'report_distributor_balance/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000047', 'SM-000006', '.png', '10', 'Distributor Payment Report', 'report_distributor_payment/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000048', 'SM-000006', '.png', '11', 'Weekly Tour Plan Report', 'report_weekly_tour_plan/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-03-09 13:11:33', 'Active');
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
INSERT INTO `ait_system_task` VALUES ('ST-000066', 'SM-000003', '.png', '12', 'Product Photo Upload', 'pdo_product_photo_upload/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-07-07 17:03:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000067', 'SM-000003', '.png', '13', 'PRI Product Review', 'pdo_product_review/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-07-18 17:33:49', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000068', 'SM-000003', '.png', '14', 'Zone Sale Target', 'product_sale_target_zone/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000069', 'SM-000006', '', '20', 'Product Sale Target (Marketing)', 'report_product_sale_target_marketing/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000070', 'SM-000002', '', '23', 'Delete Distributor Payment', 'delete_distributor_add_payment/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000071', 'SM-000003', '.png', '15', 'PDO Product View', 'pdo_product_review_view/list_frm.php', 'add', 'save', 'edit', 'delete', 'details', 'report', '0000-00-00 00:00:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000072', 'SM-000007', 'ST-000072.png', '1', 'Create Crop', 'create_crop', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-09-11 23:31:15', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000073', 'SM-000007', 'ST-000073.png', '2', 'Create Type', 'create_crop_type', 'add', 'save', 'edit', 'delete', 'details', 'report', '2014-09-16 17:45:46', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000074', 'SM-000007', 'ST-000074.png', '4', 'Create Variety', 'create_crop_variety', 'add', 'save', 'edit', 'delete', 'details', 'report', '2015-02-05 16:49:31', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000075', 'SM-000007', 'ST-000074.png', '3', 'Create Principal', 'create_principal', '', null, '', '', '', '', '2015-02-05 16:49:36', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000076', 'SM-000007', 'ST-000074.png', '5', 'Create Fertilizer', 'create_fertilizer', '', null, '', '', '', '', '2014-09-17 20:58:30', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000077', 'SM-000007', 'ST-000074.png', '6', 'Create Pesticide & Fungicide', 'create_pesticide', '', null, '', '', '', '', '2014-09-17 20:58:44', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000078', 'SM-000007', 'ST-000074.png', '7', 'Create Plot', 'create_plot', '', null, '', '', '', '', '2014-09-17 20:58:48', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000079', 'SM-000008', 'ST-000074.png', '1', 'Plot Design', 'rnd_plot_design', '', null, '', '', '', '', '2014-09-17 22:34:40', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000080', 'SM-000008', '', '2', 'Fertiliser Requirement', 'rnd_feriliser_requirement', '', null, '', '', '', '', '2014-09-17 22:34:43', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000081', 'SM-000008', '', '3', 'Fertiliser Stock In', 'rnd_feriliser_stock_in', '', null, '', '', '', '', '2014-09-17 22:34:45', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000082', 'SM-000008', '', '4', 'Fertiliser Stock Out', 'rnd_feriliser_stock_out', '', null, '', '', '', '', '2014-09-17 22:34:47', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000083', 'SM-000008', '', '5', 'Pesticide Stock In', 'rnd_pesticide_stock_in', '', null, '', '', '', '', '2014-09-17 22:34:49', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000084', 'SM-000008', '', '6', 'Pesticide Stock Out', 'rnd_pesticide_stock_out', '', null, '', '', '', '', '2014-09-17 22:34:52', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000085', 'SM-000008', '', '7', 'Labour Activities', 'rnd_labour_activities', '', null, '', '', '', '', '2014-09-17 22:34:54', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000086', 'SM-000009', '', '3', '15 Day\'s Text Entry', 'data_text_fifteen_days', '', null, '', '', '', '', '2015-02-08 22:47:10', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000087', 'SM-000009', '', '4', '15 Day\'s Image Entry', 'data_image_fifteen_days', '', null, '', '', '', '', '2015-02-08 22:47:02', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000088', 'SM-000009', '', '13', 'Harvest Cropwise Text Setup ', 'setup_text_harvest_cropwise', '', null, '', '', '', '', '2015-02-09 04:17:53', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000089', 'SM-000009', '', '8', 'Flowering Image Entry', 'data_image_flowering', '', null, '', '', '', '', '2015-02-08 22:48:00', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000090', 'SM-000009', '', '14', 'Harvest Cropwise Image Setup', 'setup_image_harvest_cropwise', '', null, '', '', '', '', '2015-02-09 04:19:02', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000091', 'SM-000009', '', '15', 'Harvest Cropwise Text Entry', 'data_text_harvest_cropwise', '', null, '', '', '', '', '2015-02-09 04:20:12', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000092', 'SM-000009', '', '16', 'Harvest Cropwise Image Entry', 'data_image_harvest_cropwise', '', null, '', '', '', '', '2015-02-09 04:20:46', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000093', 'SM-000009', '', '17', 'Harvest Compile Text Setup', 'setup_text_harvest_compile', '', null, '', '', '', '', '2015-02-10 18:32:08', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000094', 'SM-000010', '', '1', 'Crop Classification', 'hofc_crop_classification', '', null, '', '', '', '', '2014-09-18 19:00:37', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000095', 'SM-000010', '', '2', 'Sample Local Procurement', 'hofc_sample_local_procurement', '', null, '', '', '', '', '2014-09-18 19:01:09', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000096', 'SM-000010', '', '3', 'Sample Principal Procurement', 'hofc_principal_procurement', '', null, '', '', '', '', '2014-09-18 19:01:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000097', 'SM-000011', '', '2', 'Sample Delivery Status', 'general_sample_delivery', '', null, '', '', '', '', '2015-02-05 16:53:50', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000098', 'SM-000009', '', '9', 'Fruit Text Setup', 'setup_text_fruit', '', '', '', '', '', '', '2015-02-09 02:31:05', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000099', 'SM-000009', '', '10', 'Fruit Image Setup', 'setup_image_fruit', '', '', '', '', '', '', '2015-02-09 02:31:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000100', 'SM-000012', '', '0', 'Fertilizer Current Stock Report', 'rnd_fertilizer_current_stock', '', null, '', '', '', '', '2015-01-14 00:00:38', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000101', 'SM-000012', '', '0', 'Pesticide Current Stock Report', 'rnd_pesticide_current_stock', '', null, '', '', '', '', '2015-01-14 04:12:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000102', 'SM-000012', '', '0', 'Labour Activity Report', 'rnd_labour_activity_report', '', null, '', '', '', '', '2015-01-15 02:18:52', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000103', 'SM-000012', '', '0', 'Procurement Report', 'rnd_procurement_report', '', null, '', '', '', '', '2015-01-18 21:09:45', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000104', 'SM-000011', '', '3', 'Crop Info', 'general_crop_info_report', '', null, '', '', '', '', '2015-02-05 16:52:42', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000105', 'SM-000011', '', '1', 'Delivery And Sowing Setup', 'delivery_and_sowing_setup', '', null, '', '', '', '', '2015-02-05 16:54:08', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000106', 'SM-000009', '', '1', '15 Days Text Setup', 'setup_text_fifteen_days', '', null, '', '', '', '', '2015-02-08 22:44:59', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000107', 'SM-000009', '', '2', '15 Days Image Setup', 'setup_image_fifteen_days', '', null, '', '', '', '', '2015-02-05 16:59:52', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000108', 'SM-000009', '', '6', 'Flowering Image Setup', 'setup_image_flowering', '', null, '', '', '', '', '2015-02-06 03:50:54', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000109', 'SM-000009', '', '5', 'Flowering Text Setup', 'setup_text_flowering', '', null, '', '', '', '', '2015-02-07 23:25:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000110', 'SM-000009', '', '7', 'Flowering Text Entry', 'data_text_flowering', '', null, '', '', '', '', '2015-02-08 22:46:09', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000111', 'SM-000009', '', '11', 'Fruit Text Entry', 'data_text_fruit', '', null, '', '', '', '', '2015-02-10 18:27:54', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000112', 'SM-000009', '', '12', 'Fruit Image Entry', 'data_image_fruit', '', null, '', '', '', '', '2015-02-10 18:28:12', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000113', 'SM-000009', '', '18', 'Harvest Compile Text Entry', 'data_text_harvest_compile', '', null, '', '', '', '', '2015-02-10 18:38:32', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000114', 'SM-000009', '', '19', 'Yield Cropwise Text Setup', 'setup_text_yield_cropwise', '', null, '', '', '', '', '2015-02-10 18:41:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000115', 'SM-000009', '', '20', 'Yield Cropwise Text Entry', 'data_text_yield_cropwise', '', null, '', '', '', '', '2015-02-10 18:42:29', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000116', 'SM-000009', '', '21', 'Veg Fruit Text Setup', 'setup_text_veg_fruit_cropwise', '', null, '', '', '', '', '2015-02-19 15:30:20', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000117', 'SM-000009', '', '22', 'Veg Fruit Text Entry', 'data_text_veg_fruit_cropwise', '', null, '', '', '', '', '2015-02-19 15:30:37', 'Active');

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
) ENGINE=InnoDB AUTO_INCREMENT=11226 DEFAULT CHARSET=utf8;

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
INSERT INTO `ait_user_group` VALUES ('11173', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000098', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11174', 'UG-000001', 'Administrator', 'SM-000009', 'ST-000099', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11175', 'UG-000001', 'Administrator', 'SM-000012', 'ST-000100', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11176', 'UG-000001', 'Administrator', 'SM-000012', 'ST-000101', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11177', 'UG-000001', 'Administrator', 'SM-000012', 'ST-000102', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11178', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000072', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11179', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000073', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11180', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000074', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11181', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000075', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11182', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000076', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11183', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000077', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11184', 'UG-000012', 'R&D - Admin', 'SM-000007', 'ST-000078', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11185', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000079', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11186', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000080', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11187', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000081', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11188', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000082', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11189', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000083', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11190', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000084', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11191', 'UG-000012', 'R&D - Admin', 'SM-000008', 'ST-000085', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11192', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000098', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11193', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000099', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11194', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000086', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11195', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000087', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11196', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000088', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11197', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000089', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11198', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000090', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11199', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000091', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11200', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000092', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11201', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000093', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11202', 'UG-000012', 'R&D - Admin', 'SM-000010', 'ST-000094', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11203', 'UG-000012', 'R&D - Admin', 'SM-000010', 'ST-000095', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11204', 'UG-000012', 'R&D - Admin', 'SM-000010', 'ST-000096', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11205', 'UG-000012', 'R&D - Admin', 'SM-000011', 'ST-000097', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11206', 'UG-000012', 'R&D - Admin', 'SM-000012', 'ST-000101', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11207', 'UG-000012', 'R&D - Admin', 'SM-000012', 'ST-000103', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11208', 'UG-000012', 'R&D - Admin', 'SM-000012', 'ST-000100', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11209', 'UG-000012', 'R&D - Admin', 'SM-000012', 'ST-000102', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11210', 'UG-000012', 'R&D - Admin', 'SM-000011', 'ST-000105', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11211', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000106', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11212', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000107', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11213', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000108', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11214', 'UG-000012', 'R&D - Admin', 'SM-000011', 'ST-000104', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11215', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000109', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11216', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000110', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11219', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000111', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11220', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000112', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11221', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000113', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11222', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000114', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11223', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000115', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11224', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000116', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');
INSERT INTO `ait_user_group` VALUES ('11225', 'UG-000012', 'R&D - Admin', 'SM-000009', 'ST-000117', 'add', 'save', 'edit', 'delete', 'details', 'report', '', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_user_login
-- ----------------------------
INSERT INTO `ait_user_login` VALUES ('1', 'UI-000001', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '0', '', '', '', 'UG-000001', 'super', 'ee96ba35751a964c34782fc0930952c0', null, '0', '2014-05-28 03:13:12', null, 'Active', '0', '31120701.jpg', null, null);
INSERT INTO `ait_user_login` VALUES ('17', 'UI-000002', 'EI-000019', 'Thanvir Salim Noor', 'Warehouse', '0', '', '', 'WI-000001', 'UG-000002', '0012', '912a56303faecda9f092b629cb97c9c8', null, '0', '2014-12-18 03:16:51', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('18', 'UI-000003', 'EI-000020', 'Md. Sanowar Hossain', 'Marketing', '0', '', '', '', 'UG-000005', 'sanowar', '5fb552d46349660d5f1bb19a5589748b', null, '0', '2014-09-02 19:41:02', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('19', 'UI-000004', 'EI-000021', 'Md. Tariqul Islam', 'Marketing', '0', '', '', '', 'UG-000007', '0017', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('20', 'UI-000005', 'EI-000027', 'Dr. Arif Matin ', 'Marketing', '0', '', '', '', 'UG-000006', '009', 'db41d3d6f9a305c69a9325abedc5aab8', null, '0', '2014-12-09 00:20:42', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('21', 'UI-000006', 'EI-000018', 'A.K.M Shahidul Islam', 'Marketing', '0', '', '', '', 'UG-000004', '0010', '70ea1362715c3999c66da263dbadb141', null, '0', '2014-12-31 00:47:05', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('22', 'UI-000007', 'EI-000006', 'Md. Nazmul Kabir', 'Division', 'DI-000002', 'ZI-000005', '', '', 'UG-000008', '0060', 'ac011ca77935a01c3bb14b52a1a571e0', null, '0', '2015-01-07 04:06:41', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('23', 'UI-000008', 'EI-000064', 'Siddique Bazaar', 'Warehouse', '0', '', '', 'WI-000003', 'UG-000002', 'siddique_bazar ', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('24', 'UI-000009', 'EI-000065', 'Rangpur', 'Warehouse', '0', '', '', 'WI-000002', 'UG-000002', 'rangpur', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('25', 'UI-000010', 'EI-000023', 'Md. Zakir Hossain', 'Division', 'DI-000001', '', '', '', 'UG-000008', '0018', '3a648655fda348301400125166e79568', null, '0', '2014-07-10 21:47:23', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('26', 'UI-000011', 'EI-000082', 'Abdus Satter Molla', 'Zone', '', 'ZI-000009', '', '', 'UG-000003', '0050', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-05 05:48:15', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('27', 'UI-000012', 'EI-000066', 'Md. Mojnur Rahman', 'Division', 'DI-000002', '', '', '', 'UG-000008', '0027', '49f0c5d6f2b3c882e6a37dad50de2999', null, '0', '2014-07-10 21:47:30', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('28', 'UI-000013', 'EI-000007', 'Md. Mustafizar Rahman', 'Zone', '0', 'ZI-000007', '', '', 'UG-000003', '0057', '363776a769d5e837d28b47600a6c8ed1', null, '0', '2014-07-07 23:20:44', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('29', 'UI-000014', 'EI-000008', 'Md. Alimuzzaman (Babu)', 'Zone', '', 'ZI-000008', '', '', 'UG-000003', '0054', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-05 05:49:13', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('30', 'UI-000015', 'EI-000011', 'Md. Rezaul Karim', 'Zone', '', 'ZI-000011', '', '', 'UG-000003', '0052', '49f0c5d6f2b3c882e6a37dad50de2999', null, '0', '2014-12-08 01:47:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('31', 'UI-000016', 'EI-000009', 'Md. Abdul Alim', 'Zone', '', 'ZI-000010', '', '', 'UG-000003', '0056', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-05 05:46:21', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('32', 'UI-000017', 'EI-000013', 'Md. Harun-Or-Rashid', 'Zone', '0', 'ZI-000006', '', '', 'UG-000003', '0055', '416106893283dbf1de5deca26a0e0806', null, '0', '2014-07-08 04:25:05', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('33', 'UI-000018', 'EI-000067', 'S.M Sarowar Hossain', 'Zone', '', 'ZI-000004', '', '', 'UG-000003', '0068', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-05 05:49:42', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('34', 'UI-000019', 'EI-000012', 'A.R.M Roknuzzaman Prodhan', 'Zone', '0', 'ZI-000003', '', '', 'UG-000003', '0053', '3a648655fda348301400125166e79568', null, '0', '2014-12-17 20:32:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('35', 'UI-000020', 'EI-000010', 'Md. Abdul hai', 'Zone', '0', 'ZI-000002', '', '', 'UG-000003', '0051', 'd010520096297a86347279e997b542c7', null, '0', '2014-06-25 07:32:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('36', 'UI-000021', 'EI-000072', 'Md. Zakir Hossain', 'Zone', '0', 'ZI-000001', '', '', 'UG-000003', '0064', '3a648655fda348301400125166e79568', null, '0', '2014-06-17 21:26:03', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('37', 'UI-000022', 'EI-000005', ' Prantosh Kumar', 'Marketing', '', '', '', '', 'UG-000009', '0061', 'e282f38bf49ccf5d334832445354a5a8', null, '0', '2014-09-19 00:28:09', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('38', 'UI-000023', 'EI-000004', 'Md. Fazlul Karim', 'Marketing', '', '', '', '', 'UG-000009', '0063', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('39', 'UI-000024', 'EI-000003', 'Md. Iklash Hussain', 'Marketing', '', '', '', '', 'UG-000009', '0065', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('40', 'UI-000025', 'EI-000002', 'Md. Shafiur Rahman', 'Marketing', '', '', '', '', 'UG-000009', '0066', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('41', 'UI-000026', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '', '', '', '', 'UG-000009', '0067', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('42', 'UI-000027', 'EI-000060', 'Sumon Sarker', 'Marketing', '', '', '', '', 'UG-000009', '0042', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('43', 'UI-000028', 'EI-000071', 'Swarup Podder', 'Marketing', '', '', '', '', 'UG-000010', '0080', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('44', 'UI-000029', 'EI-000069', 'Md. Arefur Rahman', 'Marketing', '', '', '', '', 'UG-000010', '0081', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('45', 'UI-000030', 'EI-000022', 'Md. Abidur Rahman', 'Marketing', '', '', '', '', 'UG-000011', '0026', '145066a3eac722fc69fdc1c0d769cd39', null, '0', '2014-08-12 02:41:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('46', 'UI-000031', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '', '', '', '', 'UG-000011', 'pdo', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('47', 'UI-000032', 'EI-000078', 'Md. Hadiuzzaman', 'Marketing', '', '', '', '', 'UG-000010', '0083', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('48', 'UI-000033', 'EI-000079', 'Md. Asraf Khan', 'Zone', '', 'ZI-000009', '', '', 'UG-000003', '0069', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('49', 'UI-000034', 'EI-000086', 'Md. Tojammel Hoque', 'Zone', '', 'ZI-000010', '', '', 'UG-000003', '0072', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('50', 'UI-000035', 'EI-000084', 'Md. Refayet Ullah Bhuiyan', 'Zone', '', 'ZI-000008', '', '', 'UG-000003', '0070', '3a648655fda348301400125166e79568', null, '0', '2014-12-17 20:40:30', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('51', 'UI-000036', 'EI-000083', 'Md. Masudur Rahman', 'Zone', '', 'ZI-000004', '', '', 'UG-000003', '0071', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-10 03:51:56', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('52', 'UI-000037', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '', '', '', '', 'UG-000012', 'rnd', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);

-- ----------------------------
-- Table structure for `delivery_and_sowing_setup`
-- ----------------------------
DROP TABLE IF EXISTS `delivery_and_sowing_setup`;
CREATE TABLE `delivery_and_sowing_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `estimated_delivery_date` int(11) DEFAULT NULL,
  `delivery_date` int(11) DEFAULT NULL,
  `receive_date` int(11) DEFAULT NULL,
  `sowing_status` tinyint(4) DEFAULT '0',
  `sowing_date` int(11) DEFAULT NULL,
  `transplanting_date` int(11) DEFAULT NULL,
  `season_end_status` tinyint(4) DEFAULT '0',
  `season_end_date` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery_and_sowing_setup
-- ----------------------------
INSERT INTO `delivery_and_sowing_setup` VALUES ('2', '2014', '1', '1', '1391536800', '1391968800', '1392141600', '1', '1393264800', null, '0', null, '1', 'UI-000037', '1423370581', 'UI-000037', '1423370750');
INSERT INTO `delivery_and_sowing_setup` VALUES ('3', '2014', '1', '4', '1391536800', '1391968800', '1392141600', '1', '1393264800', null, '0', null, '1', 'UI-000037', '1423372759', 'UI-000037', '1423372839');

-- ----------------------------
-- Table structure for `rnd_crop`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_crop`;
CREATE TABLE `rnd_crop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_name` varchar(255) NOT NULL,
  `crop_code` varchar(255) NOT NULL,
  `crop_height` float DEFAULT NULL,
  `crop_width` float DEFAULT NULL,
  `fruit_type` tinyint(4) NOT NULL,
  `sample_size` float NOT NULL,
  `initial_plants` int(11) NOT NULL,
  `plants_per_hectare` int(11) NOT NULL,
  `ordering` int(11) DEFAULT '99',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_crop
-- ----------------------------
INSERT INTO `rnd_crop` VALUES ('1', 'Cauliflower', 'CF', '25.5', '3.5', '2', '1', '30', '37037', '2', '1', 'UI-000037', '1422519568', 'UI-000037', '1423285126');
INSERT INTO `rnd_crop` VALUES ('2', 'Cabbage', 'CA', '25.5', '3.5', '5', '1', '30', '37037', '6', '1', 'UI-000037', '1422519707', 'UI-000037', '1423285152');
INSERT INTO `rnd_crop` VALUES ('3', 'Knolkhol', 'KL', '25.5', '3.5', '5', '1', '30', '37037', '10', '1', 'UI-000037', '1422519814', 'UI-000037', '1423285204');
INSERT INTO `rnd_crop` VALUES ('4', 'Tomato', 'TO', '23', '4.5', '1', '1', '20', '37037', '18', '1', 'UI-000037', '1422519944', 'UI-000037', '1423285401');
INSERT INTO `rnd_crop` VALUES ('5', 'Chilli', 'CH', '23', '4', '1', '1', '20', '37037', '20', '1', 'UI-000037', '1422520142', 'UI-000037', '1423285438');
INSERT INTO `rnd_crop` VALUES ('6', 'Brinjal', 'BN', '33', '3.5', '1', '1', '15', '28571', '99', '1', 'UI-000037', '1422520372', null, null);
INSERT INTO `rnd_crop` VALUES ('7', 'Cucumber', 'CU', '19', '10', '1', '1', '10', '2500', '99', '1', 'UI-000037', '1422520575', null, null);
INSERT INTO `rnd_crop` VALUES ('8', 'Bitter gourd', 'BT', '22', '10', '1', '3', '8', '5000', '99', '1', 'UI-000037', '1422520894', null, null);
INSERT INTO `rnd_crop` VALUES ('9', 'Bottle gourd', 'BO', '22', '10', '1', '3', '6', '2500', '99', '1', 'UI-000037', '1422520986', null, null);
INSERT INTO `rnd_crop` VALUES ('10', 'Pupmkin', 'PU', '32', '15', '1', '3', '5', '3000', '99', '1', 'UI-000037', '1422521115', null, null);
INSERT INTO `rnd_crop` VALUES ('11', 'Ridge gourd', 'RG', '22', '10', '1', '3', '8', '5000', '99', '1', 'UI-000037', '1422521223', null, null);
INSERT INTO `rnd_crop` VALUES ('12', 'Snake gourd', 'SG', '22', '10', '1', '3', '8', '5000', '99', '1', 'UI-000037', '1422521322', null, null);
INSERT INTO `rnd_crop` VALUES ('13', 'Wax gourd', 'WG', '22', '10', '1', '3', '8', '5000', '99', '1', 'UI-000037', '1422521406', null, null);
INSERT INTO `rnd_crop` VALUES ('14', 'Sponge gourd', 'SPG', '22', '10', '1', '3', '8', '5000', '99', '1', 'UI-000037', '1422521505', null, null);
INSERT INTO `rnd_crop` VALUES ('15', 'Radish', 'RD', '13', '3.5', '3', '5', '60', '222222', '99', '1', 'UI-000037', '1422521677', null, null);
INSERT INTO `rnd_crop` VALUES ('16', 'Carrot', 'CR', '8', '3.5', '3', '5', '60', '222222', '99', '1', 'UI-000037', '1422521876', null, null);
INSERT INTO `rnd_crop` VALUES ('17', 'Okra', 'OK', '23', '3.5', '1', '5', '20', '55555', '99', '1', 'UI-000037', '1422522060', null, null);
INSERT INTO `rnd_crop` VALUES ('18', 'Water Melon', 'WM', '32', '12', '1', '3', '5', '3000', '99', '1', 'UI-000037', '1422522202', null, null);
INSERT INTO `rnd_crop` VALUES ('19', 'Coriander', 'CO', '33', '3.5', '4', '20', '360', '800000', '99', '1', 'UI-000037', '1422522345', null, null);
INSERT INTO `rnd_crop` VALUES ('20', 'Broccoli', 'BR', '25.5', '3.5', '2', '1', '30', '37037', '4', '1', 'UI-000037', '1423284645', 'UI-000037', '1423285220');
INSERT INTO `rnd_crop` VALUES ('21', 'Chinese Cabbage', 'CC', '25.5', '3.5', '5', '1', '30', '37037', '8', '1', 'UI-000037', '1423284759', 'UI-000037', '1423285240');
INSERT INTO `rnd_crop` VALUES ('22', 'Turnip', 'TR', '25.5', '3.5', '5', '1', '30', '37037', '12', '1', 'UI-000037', '1423284842', 'UI-000037', '1423285277');
INSERT INTO `rnd_crop` VALUES ('23', 'Beet Root', 'BRT', '25.5', '3.5', '5', '1', '30', '37037', '14', '1', 'UI-000037', '1423284986', 'UI-000037', '1423285300');
INSERT INTO `rnd_crop` VALUES ('24', 'Spinach', 'SP', '33', '3.5', '4', '10', '360', '100000', '16', '1', 'UI-000037', '1423285115', 'UI-000037', '1423285342');

-- ----------------------------
-- Table structure for `rnd_crop_type`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_crop_type`;
CREATE TABLE `rnd_crop_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_code` varchar(255) NOT NULL,
  `terget_length` float NOT NULL,
  `terget_weight` float NOT NULL,
  `terget_yeild` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_crop_type
-- ----------------------------
INSERT INTO `rnd_crop_type` VALUES ('1', '1', 'Extra Early', 'EX', '12', '500', '25', '1', 'UI-000037', '1422522955', null, null);
INSERT INTO `rnd_crop_type` VALUES ('2', '1', 'Early', 'E', '10', '700', '30', '1', 'UI-000037', '1422523001', null, null);
INSERT INTO `rnd_crop_type` VALUES ('3', '1', 'MID', 'M', '13', '1500', '35', '1', 'UI-000037', '1422523050', null, null);
INSERT INTO `rnd_crop_type` VALUES ('4', '1', 'Late', 'L', '14', '2000', '40', '1', 'UI-000037', '1422523135', null, null);
INSERT INTO `rnd_crop_type` VALUES ('5', '2', 'Early', 'E', '10', '1200', '30', '1', 'UI-000037', '1422523239', null, null);
INSERT INTO `rnd_crop_type` VALUES ('6', '2', 'Late', 'L', '12', '2000', '40', '1', 'UI-000037', '1422523287', null, null);
INSERT INTO `rnd_crop_type` VALUES ('7', '3', 'Early', 'E', '11', '22', '33', '1', 'UI-000037', '1422523394', null, null);
INSERT INTO `rnd_crop_type` VALUES ('8', '3', 'Late', 'L', '11', '22', '33', '1', 'UI-000037', '1422523418', null, null);
INSERT INTO `rnd_crop_type` VALUES ('9', '4', 'Acidic', 'A', '11', '22', '33', '1', 'UI-000037', '1422523448', null, null);
INSERT INTO `rnd_crop_type` VALUES ('10', '4', 'Oval', 'O', '11', '22', '33', '1', 'UI-000037', '1422523470', null, null);
INSERT INTO `rnd_crop_type` VALUES ('11', '4', 'Round', 'R', '11', '22', '33', '1', 'UI-000037', '1422523487', null, null);
INSERT INTO `rnd_crop_type` VALUES ('12', '5', 'Light Green', 'LG', '11', '22', '33', '1', 'UI-000037', '1422523530', null, null);
INSERT INTO `rnd_crop_type` VALUES ('13', '5', 'Deep Green', 'DG', '11', '22', '33', '1', 'UI-000037', '1422523550', null, null);
INSERT INTO `rnd_crop_type` VALUES ('14', '5', 'Upright', 'UP', '11', '22', '33', '1', 'UI-000037', '1422523573', null, null);
INSERT INTO `rnd_crop_type` VALUES ('15', '6', 'Clustered', 'CL', '11', '22', '33', '1', 'UI-000037', '1422523615', null, null);
INSERT INTO `rnd_crop_type` VALUES ('16', '6', 'Green', 'G', '11', '22', '33', '1', 'UI-000037', '1422523637', null, null);
INSERT INTO `rnd_crop_type` VALUES ('17', '6', 'Purple', 'P', '11', '22', '33', '1', 'UI-000037', '1422523658', null, null);
INSERT INTO `rnd_crop_type` VALUES ('18', '7', 'Salad', 'S', '11', '22', '33', '1', 'UI-000037', '1422523689', null, null);
INSERT INTO `rnd_crop_type` VALUES ('19', '7', 'Khira', 'K', '11', '22', '33', '1', 'UI-000037', '1422523706', null, null);
INSERT INTO `rnd_crop_type` VALUES ('20', '7', 'Cooking', 'C', '11', '22', '33', '1', 'UI-000037', '1422523728', null, null);
INSERT INTO `rnd_crop_type` VALUES ('21', '8', 'Short', 'S', '11', '22', '33', '1', 'UI-000037', '1422523764', null, null);
INSERT INTO `rnd_crop_type` VALUES ('22', '8', 'Medium', 'M', '11', '22', '33', '1', 'UI-000037', '1422523795', null, null);
INSERT INTO `rnd_crop_type` VALUES ('23', '8', 'Long', 'L', '11', '22', '33', '1', 'UI-000037', '1422523815', null, null);
INSERT INTO `rnd_crop_type` VALUES ('24', '9', 'Deep Green', 'DG', '11', '22', '33', '1', 'UI-000037', '1422523841', null, null);
INSERT INTO `rnd_crop_type` VALUES ('25', '9', 'Light Green', 'LG', '11', '22', '33', '1', 'UI-000037', '1422523862', null, null);
INSERT INTO `rnd_crop_type` VALUES ('26', '10', 'Deep Green', 'DG', '11', '22', '33', '1', 'UI-000037', '1422523891', null, null);
INSERT INTO `rnd_crop_type` VALUES ('27', '10', 'White Spotted', 'WS', '11', '22', '33', '1', 'UI-000037', '1422523920', null, null);
INSERT INTO `rnd_crop_type` VALUES ('28', '11', 'Short', 'S', '11', '22', '33', '1', 'UI-000037', '1422523949', null, null);
INSERT INTO `rnd_crop_type` VALUES ('29', '11', 'Medium', 'M', '11', '22', '33', '1', 'UI-000037', '1422523976', null, null);
INSERT INTO `rnd_crop_type` VALUES ('30', '11', 'Long', 'L', '11', '22', '33', '1', 'UI-000037', '1422524030', null, null);
INSERT INTO `rnd_crop_type` VALUES ('31', '12', 'Deep Green', 'DG', '11', '22', '33', '1', 'UI-000037', '1422524059', null, null);
INSERT INTO `rnd_crop_type` VALUES ('32', '12', 'Light Green', 'LG', '11', '22', '33', '1', 'UI-000037', '1422524075', null, null);
INSERT INTO `rnd_crop_type` VALUES ('33', '13', 'Deep Green', 'DG', '11', '22', '33', '1', 'UI-000037', '1422524102', null, null);
INSERT INTO `rnd_crop_type` VALUES ('34', '13', 'Light Green', 'LG', '11', '22', '33', '1', 'UI-000037', '1422524119', null, null);
INSERT INTO `rnd_crop_type` VALUES ('35', '14', 'Deep Green', 'DG', '11', '22', '33', '1', 'UI-000037', '1422524142', null, null);
INSERT INTO `rnd_crop_type` VALUES ('36', '14', 'Light Green', 'LG', '11', '22', '33', '1', 'UI-000037', '1422524163', null, null);
INSERT INTO `rnd_crop_type` VALUES ('37', '15', 'Smooth Leaf', 'SL', '11', '22', '33', '1', 'UI-000037', '1422524192', null, null);
INSERT INTO `rnd_crop_type` VALUES ('38', '15', 'Spined Leaf', 'SP', '11', '22', '33', '1', 'UI-000037', '1422524215', null, null);
INSERT INTO `rnd_crop_type` VALUES ('39', '16', 'Spined Leaf', 'SP', '11', '22', '33', '1', 'UI-000037', '1422524288', null, null);
INSERT INTO `rnd_crop_type` VALUES ('40', '17', 'Spined Leaf', 'SP', '11', '22', '33', '1', 'UI-000037', '1422524324', null, null);
INSERT INTO `rnd_crop_type` VALUES ('41', '18', 'Charleston Grey', 'C', '11', '22', '33', '1', 'UI-000037', '1422524355', null, null);
INSERT INTO `rnd_crop_type` VALUES ('42', '18', 'Dragon', 'D', '11', '22', '33', '1', 'UI-000037', '1422524374', null, null);
INSERT INTO `rnd_crop_type` VALUES ('43', '18', 'Black', 'B', '11', '22', '33', '1', 'UI-000037', '1422524399', null, null);
INSERT INTO `rnd_crop_type` VALUES ('44', '19', 'Round the Year', 'R', '44', '22', '33', '1', 'UI-000037', '1422524423', 'UI-000037', '1422524998');
INSERT INTO `rnd_crop_type` VALUES ('45', '19', 'Seasonal', 'S', '11', '22', '33', '1', 'UI-000037', '1422524447', null, null);

-- ----------------------------
-- Table structure for `rnd_data_image_fifteen_days`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_image_fifteen_days`;
CREATE TABLE `rnd_data_image_fifteen_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `day_number` int(11) NOT NULL,
  `images` text,
  `remarks` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_image_fifteen_days
-- ----------------------------
INSERT INTO `rnd_data_image_fifteen_days` VALUES ('1', '2014', '1', '1', '2', '1', '30', '{\"normal\":\"CF_3.jpg\",\"replica\":\"no_image.jpg\"}', '', 'UI-000037', '1423371403', null, null);
INSERT INTO `rnd_data_image_fifteen_days` VALUES ('2', '2014', '1', '1', '2', '2', '30', '{\"normal\":\"CF_CK_3.jpg\",\"replica\":\"no_image.jpg\"}', '', 'UI-000037', '1423371403', null, null);
INSERT INTO `rnd_data_image_fifteen_days` VALUES ('3', '2014', '1', '1', '2', '1', '15', '{\"normal\":\"CF_1.jpg\",\"replica\":\"no_image.jpg\"}', 'dfvdfgdfg', 'UI-000037', '1423371467', null, null);
INSERT INTO `rnd_data_image_fifteen_days` VALUES ('4', '2014', '1', '1', '2', '2', '15', '{\"normal\":\"CF_2.jpg\",\"replica\":\"no_image.jpg\"}', 'bgfgbfgdf', 'UI-000037', '1423371467', null, null);

-- ----------------------------
-- Table structure for `rnd_data_image_flowering`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_image_flowering`;
CREATE TABLE `rnd_data_image_flowering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `flowering_time` int(11) NOT NULL,
  `images` text,
  `remarks` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_image_flowering
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_data_image_fruit`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_image_fruit`;
CREATE TABLE `rnd_data_image_fruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `harvest_no` int(11) NOT NULL,
  `images` text,
  `remarks` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_image_fruit
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_data_image_harvest_cropwise`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_image_harvest_cropwise`;
CREATE TABLE `rnd_data_image_harvest_cropwise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `harvest_no` int(11) NOT NULL,
  `images` text,
  `remarks` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_image_harvest_cropwise
-- ----------------------------
INSERT INTO `rnd_data_image_harvest_cropwise` VALUES ('1', '2014', '1', '1', '2', '1', '1', '{\"normal\":{\"1\":\"CF_8.jpg\",\"2\":\"1440_900_20110926042759454625.jpg\"},\"replica\":{\"1\":\"no_image.jpg\",\"2\":\"no_image.jpg\"}}', '{\"1\":\"\",\"2\":\"\"}', 'UI-000037', '1423470496', null, null);
INSERT INTO `rnd_data_image_harvest_cropwise` VALUES ('2', '2014', '1', '1', '2', '2', '1', '{\"normal\":{\"1\":\"CF_CK_2.jpg\",\"2\":\"CF_6.jpg\"},\"replica\":{\"1\":\"no_image.jpg\",\"2\":\"no_image.jpg\"}}', '{\"1\":\"\",\"2\":\"\"}', 'UI-000037', '1423470496', null, null);

-- ----------------------------
-- Table structure for `rnd_data_text_fifteen_days`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_text_fifteen_days`;
CREATE TABLE `rnd_data_text_fifteen_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `day_number` int(11) NOT NULL,
  `info` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_text_fifteen_days
-- ----------------------------
INSERT INTO `rnd_data_text_fifteen_days` VALUES ('1', '2014', '1', '1', '2', '1', '15', '{\"normal\":{\"plant_type_appearance\":\"5\",\"plant_uniformity\":\"6\",\"distance_from_ground_to_curd\":\"3\",\"curd_type\":\"2\",\"curd_colour\":\"5\",\"curd_compactness\":\"5\",\"curd_uniformity\":\"6\",\"disease_sustainability\":\"4\",\"adaptability\":\"Rain, \",\"special_characters\":\"dcvfdgvdf \",\"accepted\":\"0\",\"remarks\":\"dfsdfsdf\"},\"replica\":{\"plant_type_appearance\":\"\",\"plant_uniformity\":\"\",\"distance_from_ground_to_curd\":\"\",\"curd_type\":\"\",\"curd_colour\":\"\",\"curd_compactness\":\"\",\"curd_uniformity\":\"\",\"disease_sustainability\":\"\",\"adaptability\":\"\",\"special_characters\":\"\",\"accepted\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1423372598', null, null);
INSERT INTO `rnd_data_text_fifteen_days` VALUES ('2', '2014', '1', '1', '2', '2', '15', '{\"normal\":{\"plant_type_appearance\":\"4\",\"plant_uniformity\":\"5\",\"distance_from_ground_to_curd\":\"5\",\"curd_type\":\"1\",\"curd_colour\":\"3\",\"curd_compactness\":\"7\",\"curd_uniformity\":\"5\",\"disease_sustainability\":\"5\",\"adaptability\":\"Rain\",\"special_characters\":\"gfhfgh\",\"accepted\":\"0\",\"remarks\":\"hjgjgh\"},\"replica\":{\"plant_type_appearance\":\"\",\"plant_uniformity\":\"\",\"distance_from_ground_to_curd\":\"\",\"curd_type\":\"\",\"curd_colour\":\"\",\"curd_compactness\":\"\",\"curd_uniformity\":\"\",\"disease_sustainability\":\"\",\"adaptability\":\"\",\"special_characters\":\"\",\"accepted\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1423372650', null, null);
INSERT INTO `rnd_data_text_fifteen_days` VALUES ('3', '2014', '1', '4', '10', '5', '15', '{\"normal\":{\"plant_type_appearance\":\"5\",\"plant_uniformity\":\"5\",\"fruit_shape\":\"\",\"fruit_colour\":\"\",\"fruit_size\":\"\",\"fruit_bearing\":\"\",\"fruit_size_uniformity\":\"\",\"disease_sustainability\":\"6\",\"adaptability\":\"Soft Rot\",\"special_characters\":\"dfdsfsd\",\"accepted\":\"0\",\"remarks\":\"dsfdgdf\"},\"replica\":{\"plant_type_appearance\":\"4\",\"plant_uniformity\":\"7\",\"fruit_shape\":\"\",\"fruit_colour\":\"\",\"fruit_size\":\"\",\"fruit_bearing\":\"\",\"fruit_size_uniformity\":\"\",\"disease_sustainability\":\"5\",\"adaptability\":\"dfddf\",\"special_characters\":\"gfhgjjyg\",\"accepted\":\"0\",\"remarks\":\"gfhfgh\"}}', 'UI-000037', '1423373167', null, null);
INSERT INTO `rnd_data_text_fifteen_days` VALUES ('4', '2014', '1', '4', '10', '5', '30', '{\"normal\":{\"plant_type_appearance\":\"3\",\"plant_uniformity\":\"\",\"fruit_shape\":\"\",\"fruit_colour\":\"\",\"fruit_size\":\"\",\"fruit_bearing\":\"\",\"fruit_size_uniformity\":\"\",\"disease_sustainability\":\"5\",\"adaptability\":\"bvb\",\"special_characters\":\"vcbcvb\",\"accepted\":\"0\",\"remarks\":\"nmnbb\"},\"replica\":{\"plant_type_appearance\":\"\",\"plant_uniformity\":\"\",\"fruit_shape\":\"\",\"fruit_colour\":\"\",\"fruit_size\":\"\",\"fruit_bearing\":\"\",\"fruit_size_uniformity\":\"\",\"disease_sustainability\":\"\",\"adaptability\":\"\",\"special_characters\":\"\",\"accepted\":\"0\",\"remarks\":\"\"}}', 'UI-000037', '1423373190', null, null);

-- ----------------------------
-- Table structure for `rnd_data_text_flowering`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_text_flowering`;
CREATE TABLE `rnd_data_text_flowering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `info` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_text_flowering
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_data_text_fruit`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_text_fruit`;
CREATE TABLE `rnd_data_text_fruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `info` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_text_fruit
-- ----------------------------
INSERT INTO `rnd_data_text_fruit` VALUES ('1', '2014', '1', '1', '2', '2', '{\"normal\":{\"curd_type\":\"1\",\"curd_type_evaluation\":\"4\",\"curd_colour\":\"2\",\"curd_colour_evaluation\":\"4\",\"curd_weight\":\"12\",\"curd_weight_evaluation\":\"5\",\"curd_diameter\":\"43\",\"curd_diameter_evaluation\":\"3\",\"curd_height\":\"23\",\"curd_height_evaluation\":\"7\",\"curd_compactness\":\"4\",\"targeted_weight\":\"700\",\"targeted_height\":\"10\",\"taste\":\" Taste \",\"keeping_quality\":\"31\",\"special_characters\":\"Special Characters\",\"accepted\":\"1\",\"remarks\":\" Remarks \"},\"replica\":{\"curd_type\":\"\",\"curd_type_evaluation\":\"\",\"curd_colour\":\"\",\"curd_colour_evaluation\":\"\",\"curd_weight\":\"\",\"curd_weight_evaluation\":\"\",\"curd_diameter\":\"\",\"curd_diameter_evaluation\":\"\",\"curd_height\":\"\",\"curd_height_evaluation\":\"\",\"curd_compactness\":\"\",\"targeted_weight\":\"700\",\"targeted_height\":\"10\",\"taste\":\"\",\"keeping_quality\":\"\",\"special_characters\":\"\",\"accepted\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1423993880', null, null);

-- ----------------------------
-- Table structure for `rnd_data_text_harvest_compile`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_text_harvest_compile`;
CREATE TABLE `rnd_data_text_harvest_compile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `harvest_no` int(11) NOT NULL,
  `info` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_text_harvest_compile
-- ----------------------------
INSERT INTO `rnd_data_text_harvest_compile` VALUES ('1', '2014', '1', '1', '2', '1', '1', '{\"normal\":{\"f_holding_capacity\":\"34\",\"evaluation\":\"5\",\"accepted\":\"1\",\"remarks\":\" Remarks \"},\"replica\":{\"f_holding_capacity\":\"\",\"evaluation\":\"\",\"accepted\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1424356950', null, null);

-- ----------------------------
-- Table structure for `rnd_data_text_harvest_cropwise`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_text_harvest_cropwise`;
CREATE TABLE `rnd_data_text_harvest_cropwise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `harvest_no` int(11) NOT NULL,
  `info` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_text_harvest_cropwise
-- ----------------------------
INSERT INTO `rnd_data_text_harvest_cropwise` VALUES ('1', '2014', '1', '1', '2', '1', '1', '{\"normal\":{\"harvesting_date\":\"2015-01-02\",\"no_of_plants_harvested\":\"34\",\"total_harvested_wt\":\"56\",\"total_mrkt_curds\":\"43\",\"total_mrkt_curd_wt\":\"76\",\"curd_uniformity\":\"3\",\"remarks\":\" Remarks \"},\"replica\":{\"harvesting_date\":\"\",\"no_of_plants_harvested\":\"\",\"total_harvested_wt\":\"\",\"total_mrkt_curds\":\"\",\"total_mrkt_curd_wt\":\"\",\"curd_uniformity\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1424172006', 'UI-000037', '1424324039');
INSERT INTO `rnd_data_text_harvest_cropwise` VALUES ('2', '2014', '1', '1', '2', '1', '2', '{\"normal\":{\"harvesting_date\":\"2015-02-04\",\"no_of_plants_harvested\":\"34\",\"total_harvested_wt\":\"98\",\"total_mrkt_curds\":\"76\",\"total_mrkt_curd_wt\":\"23\",\"curd_uniformity\":\"5\",\"remarks\":\" Remarks  Remarks  Remarks \"},\"replica\":{\"harvesting_date\":\"\",\"no_of_plants_harvested\":\"\",\"total_harvested_wt\":\"\",\"total_mrkt_curds\":\"\",\"total_mrkt_curd_wt\":\"\",\"curd_uniformity\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1424255343', 'UI-000037', '1424324050');
INSERT INTO `rnd_data_text_harvest_cropwise` VALUES ('3', '2014', '1', '1', '2', '1', '3', '{\"normal\":{\"harvesting_date\":\"2015-02-20\",\"no_of_plants_harvested\":\"78\",\"total_harvested_wt\":\"34\",\"total_mrkt_curds\":\"565\",\"total_mrkt_curd_wt\":\"6565\",\"curd_uniformity\":\"4\",\"remarks\":\" Remarks  Remarks \"},\"replica\":{\"harvesting_date\":\"\",\"no_of_plants_harvested\":\"\",\"total_harvested_wt\":\"\",\"total_mrkt_curds\":\"\",\"total_mrkt_curd_wt\":\"\",\"curd_uniformity\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1424255459', null, null);

-- ----------------------------
-- Table structure for `rnd_data_text_yield`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_data_text_yield`;
CREATE TABLE `rnd_data_text_yield` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `info` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_data_text_yield
-- ----------------------------
INSERT INTO `rnd_data_text_yield` VALUES ('1', '2014', '1', '1', '2', '1', '{\"normal\":{\"no_of_plants_survived\":\"16\",\"survival_percentage\":\"53.33\",\"total_plant_per_ha\":\"1231\",\"max_estimated_yield_per_ha\":\"1.231\",\"max_estimated_yield_evaluation\":\"5\",\"actual_yield_per_ha\":\"53\",\"actual_yield_per_ha_evaluation\":\"6\",\"accepted\":\"1\",\"remarks\":\"Remarks\"},\"replica\":{\"no_of_plants_survived\":\"\",\"survival_percentage\":\"\",\"total_plant_per_ha\":\"\",\"max_estimated_yield_evaluation\":\"\",\"actual_yield_per_ha_evaluation\":\"\",\"accepted\":\"\",\"remarks\":\"\"}}', 'UI-000037', '1424462230', null, null);

-- ----------------------------
-- Table structure for `rnd_history`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_history`;
CREATE TABLE `rnd_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `data` varchar(255) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=735 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_history
-- ----------------------------
INSERT INTO `rnd_history` VALUES ('1', '1', 'rnd_crop', '{\"crop_name\":\"Cauliflower\",\"crop_code\":\"CF\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"2\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('2', '2', 'rnd_status_fifteen_days_report', '{\"crop_id\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('3', '2', 'rnd_status_flowering_report', '{\"crop_id\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('4', '2', 'rnd_status_fruit_report', '{\"crop_id\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('5', '2', 'rnd_status_harvest_compile_report', '{\"crop_id\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('6', '2', 'rnd_status_harvest_report', '{\"crop_id\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('7', '2', 'rnd_status_yield_report', '{\"crop_id\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519568}', 'UI-000037', 'INSERT', '1422519568');
INSERT INTO `rnd_history` VALUES ('8', '2', 'rnd_crop', '{\"crop_name\":\"Cabbage\",\"crop_code\":\"CA\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"5\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('9', '3', 'rnd_status_fifteen_days_report', '{\"crop_id\":2,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('10', '3', 'rnd_status_flowering_report', '{\"crop_id\":2,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('11', '3', 'rnd_status_fruit_report', '{\"crop_id\":2,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('12', '3', 'rnd_status_harvest_compile_report', '{\"crop_id\":2,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('13', '3', 'rnd_status_harvest_report', '{\"crop_id\":2,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('14', '3', 'rnd_status_yield_report', '{\"crop_id\":2,\"created_by\":\"UI-000037\",\"creation_date\":1422519707}', 'UI-000037', 'INSERT', '1422519707');
INSERT INTO `rnd_history` VALUES ('15', '3', 'rnd_crop', '{\"crop_name\":\"Knolkhol\",\"crop_code\":\"KL\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"5\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('16', '4', 'rnd_status_fifteen_days_report', '{\"crop_id\":3,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('17', '4', 'rnd_status_flowering_report', '{\"crop_id\":3,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('18', '4', 'rnd_status_fruit_report', '{\"crop_id\":3,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('19', '4', 'rnd_status_harvest_compile_report', '{\"crop_id\":3,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('20', '4', 'rnd_status_harvest_report', '{\"crop_id\":3,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('21', '4', 'rnd_status_yield_report', '{\"crop_id\":3,\"created_by\":\"UI-000037\",\"creation_date\":1422519814}', 'UI-000037', 'INSERT', '1422519814');
INSERT INTO `rnd_history` VALUES ('22', '4', 'rnd_crop', '{\"crop_name\":\"Tomato\",\"crop_code\":\"TO\",\"crop_width\":\"4.5\",\"crop_height\":\"23\",\"fruit_type\":\"1\",\"sample_size\":\"1\",\"initial_plants\":\"20\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('23', '5', 'rnd_status_fifteen_days_report', '{\"crop_id\":4,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('24', '5', 'rnd_status_flowering_report', '{\"crop_id\":4,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('25', '5', 'rnd_status_fruit_report', '{\"crop_id\":4,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('26', '5', 'rnd_status_harvest_compile_report', '{\"crop_id\":4,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('27', '5', 'rnd_status_harvest_report', '{\"crop_id\":4,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('28', '5', 'rnd_status_yield_report', '{\"crop_id\":4,\"created_by\":\"UI-000037\",\"creation_date\":1422519944}', 'UI-000037', 'INSERT', '1422519944');
INSERT INTO `rnd_history` VALUES ('29', '5', 'rnd_crop', '{\"crop_name\":\"Chilli\",\"crop_code\":\"CH\",\"crop_width\":\"4\",\"crop_height\":\"23\",\"fruit_type\":\"1\",\"sample_size\":\"1\",\"initial_plants\":\"20\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('30', '6', 'rnd_status_fifteen_days_report', '{\"crop_id\":5,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('31', '6', 'rnd_status_flowering_report', '{\"crop_id\":5,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('32', '6', 'rnd_status_fruit_report', '{\"crop_id\":5,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('33', '6', 'rnd_status_harvest_compile_report', '{\"crop_id\":5,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('34', '6', 'rnd_status_harvest_report', '{\"crop_id\":5,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('35', '6', 'rnd_status_yield_report', '{\"crop_id\":5,\"created_by\":\"UI-000037\",\"creation_date\":1422520142}', 'UI-000037', 'INSERT', '1422520142');
INSERT INTO `rnd_history` VALUES ('36', '6', 'rnd_crop', '{\"crop_name\":\"Brinjal\",\"crop_code\":\"BN\",\"crop_width\":\"3.5\",\"crop_height\":\"33\",\"fruit_type\":\"1\",\"sample_size\":\"1\",\"initial_plants\":\"15\",\"plants_per_hectare\":\"28571\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('37', '7', 'rnd_status_fifteen_days_report', '{\"crop_id\":6,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('38', '7', 'rnd_status_flowering_report', '{\"crop_id\":6,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('39', '7', 'rnd_status_fruit_report', '{\"crop_id\":6,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('40', '7', 'rnd_status_harvest_compile_report', '{\"crop_id\":6,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('41', '7', 'rnd_status_harvest_report', '{\"crop_id\":6,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('42', '7', 'rnd_status_yield_report', '{\"crop_id\":6,\"created_by\":\"UI-000037\",\"creation_date\":1422520372}', 'UI-000037', 'INSERT', '1422520372');
INSERT INTO `rnd_history` VALUES ('43', '7', 'rnd_crop', '{\"crop_name\":\"Cucumber\",\"crop_code\":\"CU\",\"crop_width\":\"10\",\"crop_height\":\"19\",\"fruit_type\":\"1\",\"sample_size\":\"1\",\"initial_plants\":\"10\",\"plants_per_hectare\":\"2500\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('44', '8', 'rnd_status_fifteen_days_report', '{\"crop_id\":7,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('45', '8', 'rnd_status_flowering_report', '{\"crop_id\":7,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('46', '8', 'rnd_status_fruit_report', '{\"crop_id\":7,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('47', '8', 'rnd_status_harvest_compile_report', '{\"crop_id\":7,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('48', '8', 'rnd_status_harvest_report', '{\"crop_id\":7,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('49', '8', 'rnd_status_yield_report', '{\"crop_id\":7,\"created_by\":\"UI-000037\",\"creation_date\":1422520575}', 'UI-000037', 'INSERT', '1422520575');
INSERT INTO `rnd_history` VALUES ('50', '8', 'rnd_crop', '{\"crop_name\":\"Bitter gourd\",\"crop_code\":\"BT\",\"crop_width\":\"10\",\"crop_height\":\"22\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"8\",\"plants_per_hectare\":\"5000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('51', '9', 'rnd_status_fifteen_days_report', '{\"crop_id\":8,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('52', '9', 'rnd_status_flowering_report', '{\"crop_id\":8,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('53', '9', 'rnd_status_fruit_report', '{\"crop_id\":8,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('54', '9', 'rnd_status_harvest_compile_report', '{\"crop_id\":8,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('55', '9', 'rnd_status_harvest_report', '{\"crop_id\":8,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('56', '9', 'rnd_status_yield_report', '{\"crop_id\":8,\"created_by\":\"UI-000037\",\"creation_date\":1422520894}', 'UI-000037', 'INSERT', '1422520894');
INSERT INTO `rnd_history` VALUES ('57', '9', 'rnd_crop', '{\"crop_name\":\"Bottle gourd\",\"crop_code\":\"BO\",\"crop_width\":\"10\",\"crop_height\":\"22\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"6\",\"plants_per_hectare\":\"2500\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('58', '10', 'rnd_status_fifteen_days_report', '{\"crop_id\":9,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('59', '10', 'rnd_status_flowering_report', '{\"crop_id\":9,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('60', '10', 'rnd_status_fruit_report', '{\"crop_id\":9,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('61', '10', 'rnd_status_harvest_compile_report', '{\"crop_id\":9,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('62', '10', 'rnd_status_harvest_report', '{\"crop_id\":9,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('63', '10', 'rnd_status_yield_report', '{\"crop_id\":9,\"created_by\":\"UI-000037\",\"creation_date\":1422520986}', 'UI-000037', 'INSERT', '1422520986');
INSERT INTO `rnd_history` VALUES ('64', '10', 'rnd_crop', '{\"crop_name\":\"Pupmkin\",\"crop_code\":\"PU\",\"crop_width\":\"15\",\"crop_height\":\"32\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"5\",\"plants_per_hectare\":\"3000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('65', '11', 'rnd_status_fifteen_days_report', '{\"crop_id\":10,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('66', '11', 'rnd_status_flowering_report', '{\"crop_id\":10,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('67', '11', 'rnd_status_fruit_report', '{\"crop_id\":10,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('68', '11', 'rnd_status_harvest_compile_report', '{\"crop_id\":10,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('69', '11', 'rnd_status_harvest_report', '{\"crop_id\":10,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('70', '11', 'rnd_status_yield_report', '{\"crop_id\":10,\"created_by\":\"UI-000037\",\"creation_date\":1422521115}', 'UI-000037', 'INSERT', '1422521115');
INSERT INTO `rnd_history` VALUES ('71', '11', 'rnd_crop', '{\"crop_name\":\"Ridge gourd\",\"crop_code\":\"RG\",\"crop_width\":\"10\",\"crop_height\":\"22\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"8\",\"plants_per_hectare\":\"5000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('72', '12', 'rnd_status_fifteen_days_report', '{\"crop_id\":11,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('73', '12', 'rnd_status_flowering_report', '{\"crop_id\":11,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('74', '12', 'rnd_status_fruit_report', '{\"crop_id\":11,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('75', '12', 'rnd_status_harvest_compile_report', '{\"crop_id\":11,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('76', '12', 'rnd_status_harvest_report', '{\"crop_id\":11,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('77', '12', 'rnd_status_yield_report', '{\"crop_id\":11,\"created_by\":\"UI-000037\",\"creation_date\":1422521223}', 'UI-000037', 'INSERT', '1422521223');
INSERT INTO `rnd_history` VALUES ('78', '12', 'rnd_crop', '{\"crop_name\":\"Snake gourd\",\"crop_code\":\"SG\",\"crop_width\":\"10\",\"crop_height\":\"22\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"8\",\"plants_per_hectare\":\"5000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('79', '13', 'rnd_status_fifteen_days_report', '{\"crop_id\":12,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('80', '13', 'rnd_status_flowering_report', '{\"crop_id\":12,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('81', '13', 'rnd_status_fruit_report', '{\"crop_id\":12,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('82', '13', 'rnd_status_harvest_compile_report', '{\"crop_id\":12,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('83', '13', 'rnd_status_harvest_report', '{\"crop_id\":12,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('84', '13', 'rnd_status_yield_report', '{\"crop_id\":12,\"created_by\":\"UI-000037\",\"creation_date\":1422521322}', 'UI-000037', 'INSERT', '1422521322');
INSERT INTO `rnd_history` VALUES ('85', '13', 'rnd_crop', '{\"crop_name\":\"Wax gourd\",\"crop_code\":\"WG\",\"crop_width\":\"10\",\"crop_height\":\"22\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"8\",\"plants_per_hectare\":\"5000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('86', '14', 'rnd_status_fifteen_days_report', '{\"crop_id\":13,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('87', '14', 'rnd_status_flowering_report', '{\"crop_id\":13,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('88', '14', 'rnd_status_fruit_report', '{\"crop_id\":13,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('89', '14', 'rnd_status_harvest_compile_report', '{\"crop_id\":13,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('90', '14', 'rnd_status_harvest_report', '{\"crop_id\":13,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('91', '14', 'rnd_status_yield_report', '{\"crop_id\":13,\"created_by\":\"UI-000037\",\"creation_date\":1422521406}', 'UI-000037', 'INSERT', '1422521406');
INSERT INTO `rnd_history` VALUES ('92', '14', 'rnd_crop', '{\"crop_name\":\"Sponge gourd\",\"crop_code\":\"SPG\",\"crop_width\":\"10\",\"crop_height\":\"22\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"8\",\"plants_per_hectare\":\"5000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('93', '15', 'rnd_status_fifteen_days_report', '{\"crop_id\":14,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('94', '15', 'rnd_status_flowering_report', '{\"crop_id\":14,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('95', '15', 'rnd_status_fruit_report', '{\"crop_id\":14,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('96', '15', 'rnd_status_harvest_compile_report', '{\"crop_id\":14,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('97', '15', 'rnd_status_harvest_report', '{\"crop_id\":14,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('98', '15', 'rnd_status_yield_report', '{\"crop_id\":14,\"created_by\":\"UI-000037\",\"creation_date\":1422521505}', 'UI-000037', 'INSERT', '1422521505');
INSERT INTO `rnd_history` VALUES ('99', '15', 'rnd_crop', '{\"crop_name\":\"Radish\",\"crop_code\":\"RD\",\"crop_width\":\"3.5\",\"crop_height\":\"13\",\"fruit_type\":\"3\",\"sample_size\":\"5\",\"initial_plants\":\"60\",\"plants_per_hectare\":\"222222\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('100', '16', 'rnd_status_fifteen_days_report', '{\"crop_id\":15,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('101', '16', 'rnd_status_flowering_report', '{\"crop_id\":15,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('102', '16', 'rnd_status_fruit_report', '{\"crop_id\":15,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('103', '16', 'rnd_status_harvest_compile_report', '{\"crop_id\":15,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('104', '16', 'rnd_status_harvest_report', '{\"crop_id\":15,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('105', '16', 'rnd_status_yield_report', '{\"crop_id\":15,\"created_by\":\"UI-000037\",\"creation_date\":1422521677}', 'UI-000037', 'INSERT', '1422521677');
INSERT INTO `rnd_history` VALUES ('106', '16', 'rnd_crop', '{\"crop_name\":\"Carrot\",\"crop_code\":\"CR\",\"crop_width\":\"3.5\",\"crop_height\":\"8\",\"fruit_type\":\"3\",\"sample_size\":\"5\",\"initial_plants\":\"60\",\"plants_per_hectare\":\"222222\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('107', '17', 'rnd_status_fifteen_days_report', '{\"crop_id\":16,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('108', '17', 'rnd_status_flowering_report', '{\"crop_id\":16,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('109', '17', 'rnd_status_fruit_report', '{\"crop_id\":16,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('110', '17', 'rnd_status_harvest_compile_report', '{\"crop_id\":16,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('111', '17', 'rnd_status_harvest_report', '{\"crop_id\":16,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('112', '17', 'rnd_status_yield_report', '{\"crop_id\":16,\"created_by\":\"UI-000037\",\"creation_date\":1422521876}', 'UI-000037', 'INSERT', '1422521876');
INSERT INTO `rnd_history` VALUES ('113', '17', 'rnd_crop', '{\"crop_name\":\"Okra\",\"crop_code\":\"OK\",\"crop_width\":\"3.5\",\"crop_height\":\"23\",\"fruit_type\":\"1\",\"sample_size\":\"5\",\"initial_plants\":\"20\",\"plants_per_hectare\":\"55555\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('114', '18', 'rnd_status_fifteen_days_report', '{\"crop_id\":17,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('115', '18', 'rnd_status_flowering_report', '{\"crop_id\":17,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('116', '18', 'rnd_status_fruit_report', '{\"crop_id\":17,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('117', '18', 'rnd_status_harvest_compile_report', '{\"crop_id\":17,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('118', '18', 'rnd_status_harvest_report', '{\"crop_id\":17,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('119', '18', 'rnd_status_yield_report', '{\"crop_id\":17,\"created_by\":\"UI-000037\",\"creation_date\":1422522060}', 'UI-000037', 'INSERT', '1422522060');
INSERT INTO `rnd_history` VALUES ('120', '18', 'rnd_crop', '{\"crop_name\":\"Water Melon\",\"crop_code\":\"WM\",\"crop_width\":\"12\",\"crop_height\":\"32\",\"fruit_type\":\"1\",\"sample_size\":\"3\",\"initial_plants\":\"5\",\"plants_per_hectare\":\"3000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('121', '19', 'rnd_status_fifteen_days_report', '{\"crop_id\":18,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('122', '19', 'rnd_status_flowering_report', '{\"crop_id\":18,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('123', '19', 'rnd_status_fruit_report', '{\"crop_id\":18,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('124', '19', 'rnd_status_harvest_compile_report', '{\"crop_id\":18,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('125', '19', 'rnd_status_harvest_report', '{\"crop_id\":18,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('126', '19', 'rnd_status_yield_report', '{\"crop_id\":18,\"created_by\":\"UI-000037\",\"creation_date\":1422522202}', 'UI-000037', 'INSERT', '1422522202');
INSERT INTO `rnd_history` VALUES ('127', '19', 'rnd_crop', '{\"crop_name\":\"Coriander\",\"crop_code\":\"CO\",\"crop_width\":\"3.5\",\"crop_height\":\"33\",\"fruit_type\":\"4\",\"sample_size\":\"20\",\"initial_plants\":\"360\",\"plants_per_hectare\":\"800000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('128', '20', 'rnd_status_fifteen_days_report', '{\"crop_id\":19,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('129', '20', 'rnd_status_flowering_report', '{\"crop_id\":19,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('130', '20', 'rnd_status_fruit_report', '{\"crop_id\":19,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('131', '20', 'rnd_status_harvest_compile_report', '{\"crop_id\":19,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('132', '20', 'rnd_status_harvest_report', '{\"crop_id\":19,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('133', '20', 'rnd_status_yield_report', '{\"crop_id\":19,\"created_by\":\"UI-000037\",\"creation_date\":1422522345}', 'UI-000037', 'INSERT', '1422522345');
INSERT INTO `rnd_history` VALUES ('134', '1', 'rnd_crop_type', '{\"type_name\":\"Extra Early\",\"terget_length\":\"12\",\"terget_weight\":\"500\",\"terget_yeild\":\"25\",\"crop_id\":\"1\",\"type_code\":\"EX\",\"created_by\":\"UI-000037\",\"creation_date\":1422522955}', 'UI-000037', 'INSERT', '1422522955');
INSERT INTO `rnd_history` VALUES ('135', '2', 'rnd_crop_type', '{\"type_name\":\"Early\",\"terget_length\":\"10\",\"terget_weight\":\"700\",\"terget_yeild\":\"30\",\"crop_id\":\"1\",\"type_code\":\"E\",\"created_by\":\"UI-000037\",\"creation_date\":1422523001}', 'UI-000037', 'INSERT', '1422523001');
INSERT INTO `rnd_history` VALUES ('136', '3', 'rnd_crop_type', '{\"type_name\":\"MID\",\"terget_length\":\"13\",\"terget_weight\":\"1500\",\"terget_yeild\":\"35\",\"crop_id\":\"1\",\"type_code\":\"M\",\"created_by\":\"UI-000037\",\"creation_date\":1422523050}', 'UI-000037', 'INSERT', '1422523050');
INSERT INTO `rnd_history` VALUES ('137', '4', 'rnd_crop_type', '{\"type_name\":\"Late\",\"terget_length\":\"14\",\"terget_weight\":\"2000\",\"terget_yeild\":\"40\",\"crop_id\":\"1\",\"type_code\":\"L\",\"created_by\":\"UI-000037\",\"creation_date\":1422523135}', 'UI-000037', 'INSERT', '1422523135');
INSERT INTO `rnd_history` VALUES ('138', '5', 'rnd_crop_type', '{\"type_name\":\"Early\",\"terget_length\":\"10\",\"terget_weight\":\"1200\",\"terget_yeild\":\"30\",\"crop_id\":\"2\",\"type_code\":\"E\",\"created_by\":\"UI-000037\",\"creation_date\":1422523239}', 'UI-000037', 'INSERT', '1422523239');
INSERT INTO `rnd_history` VALUES ('139', '6', 'rnd_crop_type', '{\"type_name\":\"Late\",\"terget_length\":\"12\",\"terget_weight\":\"2000\",\"terget_yeild\":\"40\",\"crop_id\":\"2\",\"type_code\":\"L\",\"created_by\":\"UI-000037\",\"creation_date\":1422523287}', 'UI-000037', 'INSERT', '1422523287');
INSERT INTO `rnd_history` VALUES ('140', '7', 'rnd_crop_type', '{\"type_name\":\"Early\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"3\",\"type_code\":\"E\",\"created_by\":\"UI-000037\",\"creation_date\":1422523394}', 'UI-000037', 'INSERT', '1422523394');
INSERT INTO `rnd_history` VALUES ('141', '8', 'rnd_crop_type', '{\"type_name\":\"Late\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"3\",\"type_code\":\"L\",\"created_by\":\"UI-000037\",\"creation_date\":1422523418}', 'UI-000037', 'INSERT', '1422523418');
INSERT INTO `rnd_history` VALUES ('142', '9', 'rnd_crop_type', '{\"type_name\":\"Acidic\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"4\",\"type_code\":\"A\",\"created_by\":\"UI-000037\",\"creation_date\":1422523448}', 'UI-000037', 'INSERT', '1422523448');
INSERT INTO `rnd_history` VALUES ('143', '10', 'rnd_crop_type', '{\"type_name\":\"Oval\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"4\",\"type_code\":\"O\",\"created_by\":\"UI-000037\",\"creation_date\":1422523470}', 'UI-000037', 'INSERT', '1422523470');
INSERT INTO `rnd_history` VALUES ('144', '11', 'rnd_crop_type', '{\"type_name\":\"Round\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"4\",\"type_code\":\"R\",\"created_by\":\"UI-000037\",\"creation_date\":1422523487}', 'UI-000037', 'INSERT', '1422523487');
INSERT INTO `rnd_history` VALUES ('145', '12', 'rnd_crop_type', '{\"type_name\":\"Light Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"5\",\"type_code\":\"LG\",\"created_by\":\"UI-000037\",\"creation_date\":1422523530}', 'UI-000037', 'INSERT', '1422523530');
INSERT INTO `rnd_history` VALUES ('146', '13', 'rnd_crop_type', '{\"type_name\":\"Deep Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"5\",\"type_code\":\"DG\",\"created_by\":\"UI-000037\",\"creation_date\":1422523550}', 'UI-000037', 'INSERT', '1422523550');
INSERT INTO `rnd_history` VALUES ('147', '14', 'rnd_crop_type', '{\"type_name\":\"Upright\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"5\",\"type_code\":\"UP\",\"created_by\":\"UI-000037\",\"creation_date\":1422523573}', 'UI-000037', 'INSERT', '1422523573');
INSERT INTO `rnd_history` VALUES ('148', '15', 'rnd_crop_type', '{\"type_name\":\"Clustered\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"6\",\"type_code\":\"CL\",\"created_by\":\"UI-000037\",\"creation_date\":1422523615}', 'UI-000037', 'INSERT', '1422523615');
INSERT INTO `rnd_history` VALUES ('149', '16', 'rnd_crop_type', '{\"type_name\":\"Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"6\",\"type_code\":\"G\",\"created_by\":\"UI-000037\",\"creation_date\":1422523637}', 'UI-000037', 'INSERT', '1422523637');
INSERT INTO `rnd_history` VALUES ('150', '17', 'rnd_crop_type', '{\"type_name\":\"Purple\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"6\",\"type_code\":\"P\",\"created_by\":\"UI-000037\",\"creation_date\":1422523658}', 'UI-000037', 'INSERT', '1422523658');
INSERT INTO `rnd_history` VALUES ('151', '18', 'rnd_crop_type', '{\"type_name\":\"Salad\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"7\",\"type_code\":\"S\",\"created_by\":\"UI-000037\",\"creation_date\":1422523689}', 'UI-000037', 'INSERT', '1422523689');
INSERT INTO `rnd_history` VALUES ('152', '19', 'rnd_crop_type', '{\"type_name\":\"Khira\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"7\",\"type_code\":\"K\",\"created_by\":\"UI-000037\",\"creation_date\":1422523706}', 'UI-000037', 'INSERT', '1422523706');
INSERT INTO `rnd_history` VALUES ('153', '20', 'rnd_crop_type', '{\"type_name\":\"Cooking\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"7\",\"type_code\":\"C\",\"created_by\":\"UI-000037\",\"creation_date\":1422523728}', 'UI-000037', 'INSERT', '1422523728');
INSERT INTO `rnd_history` VALUES ('154', '21', 'rnd_crop_type', '{\"type_name\":\"Short\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"8\",\"type_code\":\"S\",\"created_by\":\"UI-000037\",\"creation_date\":1422523764}', 'UI-000037', 'INSERT', '1422523764');
INSERT INTO `rnd_history` VALUES ('155', '22', 'rnd_crop_type', '{\"type_name\":\"Medium\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"8\",\"type_code\":\"M\",\"created_by\":\"UI-000037\",\"creation_date\":1422523795}', 'UI-000037', 'INSERT', '1422523795');
INSERT INTO `rnd_history` VALUES ('156', '23', 'rnd_crop_type', '{\"type_name\":\"Long\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"8\",\"type_code\":\"L\",\"created_by\":\"UI-000037\",\"creation_date\":1422523815}', 'UI-000037', 'INSERT', '1422523815');
INSERT INTO `rnd_history` VALUES ('157', '24', 'rnd_crop_type', '{\"type_name\":\"Deep Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"9\",\"type_code\":\"DG\",\"created_by\":\"UI-000037\",\"creation_date\":1422523841}', 'UI-000037', 'INSERT', '1422523841');
INSERT INTO `rnd_history` VALUES ('158', '25', 'rnd_crop_type', '{\"type_name\":\"Light Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"9\",\"type_code\":\"LG\",\"created_by\":\"UI-000037\",\"creation_date\":1422523862}', 'UI-000037', 'INSERT', '1422523862');
INSERT INTO `rnd_history` VALUES ('159', '26', 'rnd_crop_type', '{\"type_name\":\"Deep Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"10\",\"type_code\":\"DG\",\"created_by\":\"UI-000037\",\"creation_date\":1422523891}', 'UI-000037', 'INSERT', '1422523891');
INSERT INTO `rnd_history` VALUES ('160', '27', 'rnd_crop_type', '{\"type_name\":\"White Spotted\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"10\",\"type_code\":\"WS\",\"created_by\":\"UI-000037\",\"creation_date\":1422523920}', 'UI-000037', 'INSERT', '1422523920');
INSERT INTO `rnd_history` VALUES ('161', '28', 'rnd_crop_type', '{\"type_name\":\"Short\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"11\",\"type_code\":\"S\",\"created_by\":\"UI-000037\",\"creation_date\":1422523949}', 'UI-000037', 'INSERT', '1422523949');
INSERT INTO `rnd_history` VALUES ('162', '29', 'rnd_crop_type', '{\"type_name\":\"Medium\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"11\",\"type_code\":\"M\",\"created_by\":\"UI-000037\",\"creation_date\":1422523976}', 'UI-000037', 'INSERT', '1422523976');
INSERT INTO `rnd_history` VALUES ('163', '30', 'rnd_crop_type', '{\"type_name\":\"Long\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"11\",\"type_code\":\"L\",\"created_by\":\"UI-000037\",\"creation_date\":1422524030}', 'UI-000037', 'INSERT', '1422524030');
INSERT INTO `rnd_history` VALUES ('164', '31', 'rnd_crop_type', '{\"type_name\":\"Deep Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"12\",\"type_code\":\"DG\",\"created_by\":\"UI-000037\",\"creation_date\":1422524059}', 'UI-000037', 'INSERT', '1422524059');
INSERT INTO `rnd_history` VALUES ('165', '32', 'rnd_crop_type', '{\"type_name\":\"Light Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"12\",\"type_code\":\"LG\",\"created_by\":\"UI-000037\",\"creation_date\":1422524075}', 'UI-000037', 'INSERT', '1422524075');
INSERT INTO `rnd_history` VALUES ('166', '33', 'rnd_crop_type', '{\"type_name\":\"Deep Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"13\",\"type_code\":\"DG\",\"created_by\":\"UI-000037\",\"creation_date\":1422524102}', 'UI-000037', 'INSERT', '1422524102');
INSERT INTO `rnd_history` VALUES ('167', '34', 'rnd_crop_type', '{\"type_name\":\"Light Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"13\",\"type_code\":\"LG\",\"created_by\":\"UI-000037\",\"creation_date\":1422524119}', 'UI-000037', 'INSERT', '1422524119');
INSERT INTO `rnd_history` VALUES ('168', '35', 'rnd_crop_type', '{\"type_name\":\"Deep Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"14\",\"type_code\":\"DG\",\"created_by\":\"UI-000037\",\"creation_date\":1422524142}', 'UI-000037', 'INSERT', '1422524142');
INSERT INTO `rnd_history` VALUES ('169', '36', 'rnd_crop_type', '{\"type_name\":\"Light Green\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"14\",\"type_code\":\"LG\",\"created_by\":\"UI-000037\",\"creation_date\":1422524163}', 'UI-000037', 'INSERT', '1422524163');
INSERT INTO `rnd_history` VALUES ('170', '37', 'rnd_crop_type', '{\"type_name\":\"Smooth Leaf\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"15\",\"type_code\":\"SL\",\"created_by\":\"UI-000037\",\"creation_date\":1422524192}', 'UI-000037', 'INSERT', '1422524192');
INSERT INTO `rnd_history` VALUES ('171', '38', 'rnd_crop_type', '{\"type_name\":\"Spined Leaf\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"15\",\"type_code\":\"SP\",\"created_by\":\"UI-000037\",\"creation_date\":1422524215}', 'UI-000037', 'INSERT', '1422524215');
INSERT INTO `rnd_history` VALUES ('172', '39', 'rnd_crop_type', '{\"type_name\":\"Spined Leaf\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"16\",\"type_code\":\"SP\",\"created_by\":\"UI-000037\",\"creation_date\":1422524288}', 'UI-000037', 'INSERT', '1422524288');
INSERT INTO `rnd_history` VALUES ('173', '40', 'rnd_crop_type', '{\"type_name\":\"Spined Leaf\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"17\",\"type_code\":\"SP\",\"created_by\":\"UI-000037\",\"creation_date\":1422524324}', 'UI-000037', 'INSERT', '1422524324');
INSERT INTO `rnd_history` VALUES ('174', '41', 'rnd_crop_type', '{\"type_name\":\"Charleston Grey\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"18\",\"type_code\":\"C\",\"created_by\":\"UI-000037\",\"creation_date\":1422524355}', 'UI-000037', 'INSERT', '1422524355');
INSERT INTO `rnd_history` VALUES ('175', '42', 'rnd_crop_type', '{\"type_name\":\"Dragon\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"18\",\"type_code\":\"D\",\"created_by\":\"UI-000037\",\"creation_date\":1422524374}', 'UI-000037', 'INSERT', '1422524374');
INSERT INTO `rnd_history` VALUES ('176', '43', 'rnd_crop_type', '{\"type_name\":\"Black\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"18\",\"type_code\":\"B\",\"created_by\":\"UI-000037\",\"creation_date\":1422524399}', 'UI-000037', 'INSERT', '1422524399');
INSERT INTO `rnd_history` VALUES ('177', '44', 'rnd_crop_type', '{\"type_name\":\"Round the Year\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"19\",\"type_code\":\"R\",\"created_by\":\"UI-000037\",\"creation_date\":1422524423}', 'UI-000037', 'INSERT', '1422524423');
INSERT INTO `rnd_history` VALUES ('178', '45', 'rnd_crop_type', '{\"type_name\":\"Seasonal\",\"terget_length\":\"11\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"crop_id\":\"19\",\"type_code\":\"S\",\"created_by\":\"UI-000037\",\"creation_date\":1422524447}', 'UI-000037', 'INSERT', '1422524447');
INSERT INTO `rnd_history` VALUES ('179', '1', 'rnd_principal', '{\"contact_person_name\":\"Mr. Saiful\",\"principal_name\":\" Principal 001\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"001\",\"created_by\":\"UI-000037\",\"creation_date\":1422524559}', 'UI-000037', 'INSERT', '1422524559');
INSERT INTO `rnd_history` VALUES ('180', '2', 'rnd_principal', '{\"contact_person_name\":\"\",\"principal_name\":\" Principal 002\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"102\",\"created_by\":\"UI-000037\",\"creation_date\":1422524632}', 'UI-000037', 'INSERT', '1422524632');
INSERT INTO `rnd_history` VALUES ('181', '3', 'rnd_principal', '{\"contact_person_name\":\"Mr. Yasir\",\"principal_name\":\" Principal 003\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"103\",\"created_by\":\"UI-000037\",\"creation_date\":1422524677}', 'UI-000037', 'INSERT', '1422524677');
INSERT INTO `rnd_history` VALUES ('182', '4', 'rnd_principal', '{\"contact_person_name\":\"\",\"principal_name\":\" Principal 004\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"204\",\"created_by\":\"UI-000037\",\"creation_date\":1422524704}', 'UI-000037', 'INSERT', '1422524704');
INSERT INTO `rnd_history` VALUES ('183', '5', 'rnd_principal', '{\"contact_person_name\":\"\",\"principal_name\":\" Principal 005\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"205\",\"created_by\":\"UI-000037\",\"creation_date\":1422524724}', 'UI-000037', 'INSERT', '1422524724');
INSERT INTO `rnd_history` VALUES ('184', '6', 'rnd_principal', '{\"contact_person_name\":\"\",\"principal_name\":\" Principal 006\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"306\",\"created_by\":\"UI-000037\",\"creation_date\":1422524773}', 'UI-000037', 'INSERT', '1422524773');
INSERT INTO `rnd_history` VALUES ('185', '7', 'rnd_principal', '{\"contact_person_name\":\"\",\"principal_name\":\" Principal 007\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"107\",\"created_by\":\"UI-000037\",\"creation_date\":1422524796}', 'UI-000037', 'INSERT', '1422524796');
INSERT INTO `rnd_history` VALUES ('186', '8', 'rnd_principal', '{\"contact_person_name\":\"\",\"principal_name\":\" Principal 008\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"principal_code\":\"308\",\"created_by\":\"UI-000037\",\"creation_date\":1422524820}', 'UI-000037', 'INSERT', '1422524820');
INSERT INTO `rnd_history` VALUES ('187', '44', 'rnd_crop_type', '{\"type_name\":\"Round the Year\",\"terget_length\":\"44\",\"terget_weight\":\"22\",\"terget_yeild\":\"33\",\"modified_by\":\"UI-000037\",\"modification_date\":1422524998}', 'UI-000037', 'UPDATE', '1422524998');
INSERT INTO `rnd_history` VALUES ('188', '1', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"1\",\"variety_index\":1,\"crop_type_id\":\"2\",\"variety_name\":\"White Marble\",\"variety_type\":\"1\",\"principal_id\":\"1\",\"company_name\":\"\",\"number_of_seeds\":\"230\",\"quantity\":\"10\",\"characteristics\":\"Rain Tolerant\",\"replica_status\":false,\"new_s', 'UI-000037', 'INSERT', '1422696260');
INSERT INTO `rnd_history` VALUES ('189', '1', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":1,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422696260,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422696260');
INSERT INTO `rnd_history` VALUES ('190', '2', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":1,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422696260,\"season_id\":\"2\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422696260');
INSERT INTO `rnd_history` VALUES ('191', '3', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":1,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422696260,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422696260');
INSERT INTO `rnd_history` VALUES ('192', '4', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":1,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422696260,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422696260');
INSERT INTO `rnd_history` VALUES ('193', '5', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":1,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422696260,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422696260');
INSERT INTO `rnd_history` VALUES ('194', '1', 'rnd_variety', '{\"modified_by\":\"UI-000037\",\"modification_date\":1422696635,\"number_of_seeds\":\"230\",\"characteristics\":\"Rain Tolerant\"}', 'UI-000037', 'UPDATE', '1422696635');
INSERT INTO `rnd_history` VALUES ('195', '1', 'rnd_variety_season', '{\"modified_by\":\"UI-000037\",\"modification_date\":1422696635,\"season_status\":1}', 'UI-000037', 'UPDATE', '1422696635');
INSERT INTO `rnd_history` VALUES ('196', '2', 'rnd_variety_season', '{\"modified_by\":\"UI-000037\",\"modification_date\":1422696635,\"season_status\":1}', 'UI-000037', 'UPDATE', '1422696635');
INSERT INTO `rnd_history` VALUES ('197', '3', 'rnd_variety_season', '{\"modified_by\":\"UI-000037\",\"modification_date\":1422696635,\"season_status\":0}', 'UI-000037', 'UPDATE', '1422696635');
INSERT INTO `rnd_history` VALUES ('198', '4', 'rnd_variety_season', '{\"modified_by\":\"UI-000037\",\"modification_date\":1422696635,\"season_status\":1}', 'UI-000037', 'UPDATE', '1422696635');
INSERT INTO `rnd_history` VALUES ('199', '5', 'rnd_variety_season', '{\"modified_by\":\"UI-000037\",\"modification_date\":1422696635,\"season_status\":0}', 'UI-000037', 'UPDATE', '1422696635');
INSERT INTO `rnd_history` VALUES ('200', '2', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"1\",\"variety_index\":2,\"crop_type_id\":\"2\",\"variety_name\":\"White Thunder\",\"variety_type\":\"1\",\"principal_id\":\"2\",\"company_name\":\"\",\"number_of_seeds\":\"250\",\"quantity\":\"20\",\"characteristics\":\"ddd\",\"replica_status\":false,\"new_status\":1,', 'UI-000037', 'INSERT', '1422875192');
INSERT INTO `rnd_history` VALUES ('201', '6', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":2,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875192,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875192');
INSERT INTO `rnd_history` VALUES ('202', '7', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":2,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875192,\"season_id\":\"2\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875192');
INSERT INTO `rnd_history` VALUES ('203', '8', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":2,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875192,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875192');
INSERT INTO `rnd_history` VALUES ('204', '9', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":2,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875192,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875192');
INSERT INTO `rnd_history` VALUES ('205', '10', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":2,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875192,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875192');
INSERT INTO `rnd_history` VALUES ('206', '3', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"2\",\"variety_index\":1,\"crop_type_id\":\"5\",\"variety_name\":\"Atlas-70\",\"variety_type\":\"2\",\"principal_id\":\"\",\"company_name\":\"\",\"number_of_seeds\":\"222\",\"quantity\":\"25\",\"characteristics\":\"dsfsdf\",\"replica_status\":false,\"new_status\":1,\"st', 'UI-000037', 'INSERT', '1422875238');
INSERT INTO `rnd_history` VALUES ('207', '11', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":3,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875238,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875238');
INSERT INTO `rnd_history` VALUES ('208', '12', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":3,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875238,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875238');
INSERT INTO `rnd_history` VALUES ('209', '13', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":3,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875238,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875238');
INSERT INTO `rnd_history` VALUES ('210', '14', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":3,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875238,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875238');
INSERT INTO `rnd_history` VALUES ('211', '15', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":3,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875238,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875238');
INSERT INTO `rnd_history` VALUES ('212', '4', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"2\",\"variety_index\":2,\"crop_type_id\":\"5\",\"variety_name\":\"406\",\"variety_type\":\"1\",\"principal_id\":\"6\",\"company_name\":\"\",\"number_of_seeds\":\"200\",\"quantity\":\"30\",\"characteristics\":\"ggg\",\"replica_status\":false,\"new_status\":1,\"status\":1', 'UI-000037', 'INSERT', '1422875275');
INSERT INTO `rnd_history` VALUES ('213', '16', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":4,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875275,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875275');
INSERT INTO `rnd_history` VALUES ('214', '17', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":4,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875275,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875275');
INSERT INTO `rnd_history` VALUES ('215', '18', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":4,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875275,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875275');
INSERT INTO `rnd_history` VALUES ('216', '19', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":4,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875275,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875275');
INSERT INTO `rnd_history` VALUES ('217', '20', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":4,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875275,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875275');
INSERT INTO `rnd_history` VALUES ('218', '5', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"4\",\"variety_index\":1,\"crop_type_id\":\"10\",\"variety_name\":\"TH 04\",\"variety_type\":\"1\",\"principal_id\":\"6\",\"company_name\":\"\",\"number_of_seeds\":\"244\",\"quantity\":\"35\",\"characteristics\":\"sdfsdfd\",\"replica_status\":\"1\",\"new_status\":1,\"stat', 'UI-000037', 'INSERT', '1422875321');
INSERT INTO `rnd_history` VALUES ('219', '21', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":5,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875321,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875321');
INSERT INTO `rnd_history` VALUES ('220', '22', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":5,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875321,\"season_id\":\"2\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875321');
INSERT INTO `rnd_history` VALUES ('221', '23', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":5,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875321,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875321');
INSERT INTO `rnd_history` VALUES ('222', '24', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":5,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875321,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875321');
INSERT INTO `rnd_history` VALUES ('223', '25', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":5,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875321,\"season_id\":\"5\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875321');
INSERT INTO `rnd_history` VALUES ('224', '6', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"4\",\"variety_index\":2,\"crop_type_id\":\"10\",\"variety_name\":\"lovely\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"Lal Teer\",\"number_of_seeds\":\"222\",\"quantity\":\"35\",\"characteristics\":\"sdfsdf\",\"replica_status\":\"1\",\"new_status\":', 'UI-000037', 'INSERT', '1422875407');
INSERT INTO `rnd_history` VALUES ('225', '26', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":6,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875407,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875407');
INSERT INTO `rnd_history` VALUES ('226', '27', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":6,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875407,\"season_id\":\"2\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875407');
INSERT INTO `rnd_history` VALUES ('227', '28', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":6,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875407,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875407');
INSERT INTO `rnd_history` VALUES ('228', '29', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":6,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875407,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875407');
INSERT INTO `rnd_history` VALUES ('229', '30', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":6,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875407,\"season_id\":\"5\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875407');
INSERT INTO `rnd_history` VALUES ('230', '7', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"5\",\"variety_index\":1,\"crop_type_id\":\"12\",\"variety_name\":\"indu\",\"variety_type\":\"1\",\"principal_id\":\"8\",\"company_name\":\"\",\"number_of_seeds\":\"300\",\"quantity\":\"30\",\"characteristics\":\"dfdgdfhd\",\"replica_status\":\"1\",\"new_status\":1,\"stat', 'UI-000037', 'INSERT', '1422875464');
INSERT INTO `rnd_history` VALUES ('231', '31', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":7,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875464,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875464');
INSERT INTO `rnd_history` VALUES ('232', '32', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":7,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875464,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875464');
INSERT INTO `rnd_history` VALUES ('233', '33', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":7,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875464,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875464');
INSERT INTO `rnd_history` VALUES ('234', '34', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":7,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875464,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875464');
INSERT INTO `rnd_history` VALUES ('235', '35', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":7,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875464,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875464');
INSERT INTO `rnd_history` VALUES ('236', '8', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"5\",\"variety_index\":2,\"crop_type_id\":\"13\",\"variety_name\":\"Sakata 653\",\"variety_type\":\"2\",\"principal_id\":\"\",\"company_name\":\"\",\"number_of_seeds\":\"444\",\"quantity\":\"45\",\"characteristics\":\"rhhgjhgfg\",\"replica_status\":\"1\",\"new_status\":1', 'UI-000037', 'INSERT', '1422875512');
INSERT INTO `rnd_history` VALUES ('237', '36', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":8,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875512,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875512');
INSERT INTO `rnd_history` VALUES ('238', '37', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":8,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875512,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875512');
INSERT INTO `rnd_history` VALUES ('239', '38', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":8,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875512,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875512');
INSERT INTO `rnd_history` VALUES ('240', '39', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":8,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875512,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875512');
INSERT INTO `rnd_history` VALUES ('241', '40', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":8,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875512,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875512');
INSERT INTO `rnd_history` VALUES ('242', '9', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"6\",\"variety_index\":1,\"crop_type_id\":\"16\",\"variety_name\":\"ffffff\",\"variety_type\":\"1\",\"principal_id\":\"3\",\"company_name\":\"\",\"number_of_seeds\":\"345\",\"quantity\":\"45\",\"characteristics\":\"fghfgh\",\"replica_status\":\"1\",\"new_status\":1,\"stat', 'UI-000037', 'INSERT', '1422875542');
INSERT INTO `rnd_history` VALUES ('243', '41', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":9,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875542,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875542');
INSERT INTO `rnd_history` VALUES ('244', '42', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":9,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875542,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875542');
INSERT INTO `rnd_history` VALUES ('245', '43', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":9,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875542,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875542');
INSERT INTO `rnd_history` VALUES ('246', '44', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":9,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875542,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875542');
INSERT INTO `rnd_history` VALUES ('247', '45', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":9,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875542,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875542');
INSERT INTO `rnd_history` VALUES ('248', '10', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"6\",\"variety_index\":2,\"crop_type_id\":\"17\",\"variety_name\":\"ttt\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"sup\",\"number_of_seeds\":\"666\",\"quantity\":\"56\",\"characteristics\":\"jkgjh\",\"replica_status\":\"1\",\"new_status\":1,\"status', 'UI-000037', 'INSERT', '1422875587');
INSERT INTO `rnd_history` VALUES ('249', '46', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":10,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875587,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875587');
INSERT INTO `rnd_history` VALUES ('250', '47', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":10,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875587,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875587');
INSERT INTO `rnd_history` VALUES ('251', '48', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":10,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875587,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875587');
INSERT INTO `rnd_history` VALUES ('252', '49', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":10,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875587,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875587');
INSERT INTO `rnd_history` VALUES ('253', '50', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":10,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875587,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875587');
INSERT INTO `rnd_history` VALUES ('254', '11', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"7\",\"variety_index\":1,\"crop_type_id\":\"18\",\"variety_name\":\"f-567\",\"variety_type\":\"1\",\"principal_id\":\"8\",\"company_name\":\"\",\"number_of_seeds\":\"200\",\"quantity\":\"45\",\"characteristics\":\"hkghkh\",\"replica_status\":false,\"new_status\":1,\"sta', 'UI-000037', 'INSERT', '1422875626');
INSERT INTO `rnd_history` VALUES ('255', '51', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":11,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875626,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875626');
INSERT INTO `rnd_history` VALUES ('256', '52', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":11,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875626,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875626');
INSERT INTO `rnd_history` VALUES ('257', '53', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":11,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875626,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875626');
INSERT INTO `rnd_history` VALUES ('258', '54', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":11,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875626,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875626');
INSERT INTO `rnd_history` VALUES ('259', '55', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":11,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875626,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875626');
INSERT INTO `rnd_history` VALUES ('260', '12', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"7\",\"variety_index\":2,\"crop_type_id\":\"19\",\"variety_name\":\"shital\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"aci\",\"number_of_seeds\":\"60\",\"quantity\":\"200\",\"characteristics\":\"kghghhhhhhhhhhhhhhhhhh\",\"replica_status\":false,', 'UI-000037', 'INSERT', '1422875679');
INSERT INTO `rnd_history` VALUES ('261', '56', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":12,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875679,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875679');
INSERT INTO `rnd_history` VALUES ('262', '57', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":12,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875679,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875679');
INSERT INTO `rnd_history` VALUES ('263', '58', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":12,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875679,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875679');
INSERT INTO `rnd_history` VALUES ('264', '59', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":12,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875679,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875679');
INSERT INTO `rnd_history` VALUES ('265', '60', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":12,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875679,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875679');
INSERT INTO `rnd_history` VALUES ('266', '13', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"8\",\"variety_index\":1,\"crop_type_id\":\"23\",\"variety_name\":\"Rider\",\"variety_type\":\"1\",\"principal_id\":\"5\",\"company_name\":\"\",\"number_of_seeds\":\"8\",\"quantity\":\"50\",\"characteristics\":\"hhmdghj\",\"replica_status\":false,\"new_status\":1,\"stat', 'UI-000037', 'INSERT', '1422875804');
INSERT INTO `rnd_history` VALUES ('267', '61', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":13,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875804,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875804');
INSERT INTO `rnd_history` VALUES ('268', '62', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":13,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875804,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875804');
INSERT INTO `rnd_history` VALUES ('269', '63', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":13,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875804,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875804');
INSERT INTO `rnd_history` VALUES ('270', '64', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":13,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875804,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875804');
INSERT INTO `rnd_history` VALUES ('271', '65', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":13,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875804,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875804');
INSERT INTO `rnd_history` VALUES ('272', '14', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"8\",\"variety_index\":2,\"crop_type_id\":\"23\",\"variety_name\":\"tiya\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"Lal Teer\",\"number_of_seeds\":\"6\",\"quantity\":\"10\",\"characteristics\":\"jkhjjjjjj\",\"replica_status\":false,\"new_status\"', 'UI-000037', 'INSERT', '1422875851');
INSERT INTO `rnd_history` VALUES ('273', '66', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":14,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875851,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875851');
INSERT INTO `rnd_history` VALUES ('274', '67', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":14,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875851,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875851');
INSERT INTO `rnd_history` VALUES ('275', '68', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":14,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875851,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875851');
INSERT INTO `rnd_history` VALUES ('276', '69', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":14,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875851,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875851');
INSERT INTO `rnd_history` VALUES ('277', '70', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":14,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875851,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875851');
INSERT INTO `rnd_history` VALUES ('278', '15', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"9\",\"variety_index\":1,\"crop_type_id\":\"24\",\"variety_name\":\"ugb 111\",\"variety_type\":\"1\",\"principal_id\":\"7\",\"company_name\":\"\",\"number_of_seeds\":\"6\",\"quantity\":\"200\",\"characteristics\":\"fhfj\",\"replica_status\":false,\"new_status\":1,\"stat', 'UI-000037', 'INSERT', '1422875904');
INSERT INTO `rnd_history` VALUES ('279', '71', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":15,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875904,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875904');
INSERT INTO `rnd_history` VALUES ('280', '72', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":15,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875904,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875904');
INSERT INTO `rnd_history` VALUES ('281', '73', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":15,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875904,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875904');
INSERT INTO `rnd_history` VALUES ('282', '74', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":15,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875904,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875904');
INSERT INTO `rnd_history` VALUES ('283', '75', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":15,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875904,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875904');
INSERT INTO `rnd_history` VALUES ('284', '16', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"9\",\"variety_index\":2,\"crop_type_id\":\"25\",\"variety_name\":\"547457\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"aci\",\"number_of_seeds\":\"7\",\"quantity\":\"30\",\"characteristics\":\"hjkdghj\",\"replica_status\":false,\"new_status\":1,\"s', 'UI-000037', 'INSERT', '1422875941');
INSERT INTO `rnd_history` VALUES ('285', '76', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":16,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875941,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875941');
INSERT INTO `rnd_history` VALUES ('286', '77', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":16,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875941,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875941');
INSERT INTO `rnd_history` VALUES ('287', '78', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":16,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875941,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875941');
INSERT INTO `rnd_history` VALUES ('288', '79', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":16,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875941,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875941');
INSERT INTO `rnd_history` VALUES ('289', '80', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":16,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875941,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875941');
INSERT INTO `rnd_history` VALUES ('290', '17', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"10\",\"variety_index\":1,\"crop_type_id\":\"26\",\"variety_name\":\"rh 45\",\"variety_type\":\"1\",\"principal_id\":\"4\",\"company_name\":\"\",\"number_of_seeds\":\"12\",\"quantity\":\"40\",\"characteristics\":\"yjdyjdj\",\"replica_status\":false,\"new_status\":1,\"st', 'UI-000037', 'INSERT', '1422875983');
INSERT INTO `rnd_history` VALUES ('291', '81', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":17,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875983,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875983');
INSERT INTO `rnd_history` VALUES ('292', '82', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":17,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875983,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875983');
INSERT INTO `rnd_history` VALUES ('293', '83', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":17,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875983,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875983');
INSERT INTO `rnd_history` VALUES ('294', '84', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":17,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875983,\"season_id\":\"4\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422875983');
INSERT INTO `rnd_history` VALUES ('295', '85', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":17,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422875983,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422875983');
INSERT INTO `rnd_history` VALUES ('296', '18', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"10\",\"variety_index\":2,\"crop_type_id\":\"27\",\"variety_name\":\"Rt 56\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"aci\",\"number_of_seeds\":\"13\",\"quantity\":\"30\",\"characteristics\":\"jfkxhjfxggg\",\"replica_status\":false,\"new_status\"', 'UI-000037', 'INSERT', '1422876074');
INSERT INTO `rnd_history` VALUES ('297', '86', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":18,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876074,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876074');
INSERT INTO `rnd_history` VALUES ('298', '87', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":18,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876074,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876074');
INSERT INTO `rnd_history` VALUES ('299', '88', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":18,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876074,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876074');
INSERT INTO `rnd_history` VALUES ('300', '89', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":18,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876074,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876074');
INSERT INTO `rnd_history` VALUES ('301', '90', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":18,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876074,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876074');
INSERT INTO `rnd_history` VALUES ('302', '19', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"11\",\"variety_index\":1,\"crop_type_id\":\"30\",\"variety_name\":\"Rfghj\",\"variety_type\":\"2\",\"principal_id\":\"\",\"company_name\":\"\",\"number_of_seeds\":\"22\",\"quantity\":\"35\",\"characteristics\":\"dfhdfh\",\"replica_status\":false,\"new_status\":1,\"stat', 'UI-000037', 'INSERT', '1422876117');
INSERT INTO `rnd_history` VALUES ('303', '91', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":19,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876117,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876117');
INSERT INTO `rnd_history` VALUES ('304', '92', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":19,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876117,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876117');
INSERT INTO `rnd_history` VALUES ('305', '93', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":19,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876117,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876117');
INSERT INTO `rnd_history` VALUES ('306', '94', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":19,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876117,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876117');
INSERT INTO `rnd_history` VALUES ('307', '95', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":19,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876117,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876117');
INSERT INTO `rnd_history` VALUES ('308', '20', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"11\",\"variety_index\":2,\"crop_type_id\":\"29\",\"variety_name\":\"Vbnm\",\"variety_type\":\"1\",\"principal_id\":\"3\",\"company_name\":\"\",\"number_of_seeds\":\"20\",\"quantity\":\"50\",\"characteristics\":\"yfljfljgjh\",\"replica_status\":false,\"new_status\":1,\"', 'UI-000037', 'INSERT', '1422876187');
INSERT INTO `rnd_history` VALUES ('309', '96', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":20,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876187,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876187');
INSERT INTO `rnd_history` VALUES ('310', '97', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":20,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876187,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876187');
INSERT INTO `rnd_history` VALUES ('311', '98', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":20,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876187,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876187');
INSERT INTO `rnd_history` VALUES ('312', '99', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":20,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876187,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876187');
INSERT INTO `rnd_history` VALUES ('313', '100', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":20,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876187,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876187');
INSERT INTO `rnd_history` VALUES ('314', '21', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"12\",\"variety_index\":1,\"crop_type_id\":\"31\",\"variety_name\":\"Sjko\",\"variety_type\":\"1\",\"principal_id\":\"2\",\"company_name\":\"\",\"number_of_seeds\":\"15\",\"quantity\":\"100\",\"characteristics\":\"fjhgtiuy\",\"replica_status\":false,\"new_status\":1,\"s', 'UI-000037', 'INSERT', '1422876279');
INSERT INTO `rnd_history` VALUES ('315', '101', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":21,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876279,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876279');
INSERT INTO `rnd_history` VALUES ('316', '102', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":21,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876279,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876279');
INSERT INTO `rnd_history` VALUES ('317', '103', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":21,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876279,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876279');
INSERT INTO `rnd_history` VALUES ('318', '104', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":21,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876279,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876279');
INSERT INTO `rnd_history` VALUES ('319', '105', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":21,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876279,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876279');
INSERT INTO `rnd_history` VALUES ('320', '22', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"13\",\"variety_index\":1,\"crop_type_id\":\"33\",\"variety_name\":\"hvhjvb,j\",\"variety_type\":\"1\",\"principal_id\":\"8\",\"company_name\":\"\",\"number_of_seeds\":\"13\",\"quantity\":\"277\",\"characteristics\":\"gfjhg\",\"replica_status\":false,\"new_status\":1,\"', 'UI-000037', 'INSERT', '1422876314');
INSERT INTO `rnd_history` VALUES ('321', '106', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":22,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876314,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876314');
INSERT INTO `rnd_history` VALUES ('322', '107', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":22,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876314,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876314');
INSERT INTO `rnd_history` VALUES ('323', '108', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":22,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876314,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876314');
INSERT INTO `rnd_history` VALUES ('324', '109', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":22,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876314,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876314');
INSERT INTO `rnd_history` VALUES ('325', '110', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":22,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876314,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876314');
INSERT INTO `rnd_history` VALUES ('326', '23', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"12\",\"variety_index\":2,\"crop_type_id\":\"32\",\"variety_name\":\"Ge45\",\"variety_type\":\"2\",\"principal_id\":\"\",\"company_name\":\"\",\"number_of_seeds\":\"14\",\"quantity\":\"45\",\"characteristics\":\"bgfjgk\",\"replica_status\":false,\"new_status\":1,\"statu', 'UI-000037', 'INSERT', '1422876350');
INSERT INTO `rnd_history` VALUES ('327', '111', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":23,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876350,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876350');
INSERT INTO `rnd_history` VALUES ('328', '112', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":23,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876350,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876350');
INSERT INTO `rnd_history` VALUES ('329', '113', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":23,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876350,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876350');
INSERT INTO `rnd_history` VALUES ('330', '114', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":23,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876350,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876350');
INSERT INTO `rnd_history` VALUES ('331', '115', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":23,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876350,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876350');
INSERT INTO `rnd_history` VALUES ('332', '24', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"13\",\"variety_index\":2,\"crop_type_id\":\"34\",\"variety_name\":\"S r\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"hk\",\"number_of_seeds\":\"17\",\"quantity\":\"30\",\"characteristics\":\"fluhghjbv\",\"replica_status\":false,\"new_status\":1,\"s', 'UI-000037', 'INSERT', '1422876398');
INSERT INTO `rnd_history` VALUES ('333', '116', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":24,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876398,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876398');
INSERT INTO `rnd_history` VALUES ('334', '117', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":24,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876398,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876398');
INSERT INTO `rnd_history` VALUES ('335', '118', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":24,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876398,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876398');
INSERT INTO `rnd_history` VALUES ('336', '119', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":24,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876398,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876398');
INSERT INTO `rnd_history` VALUES ('337', '120', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":24,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876398,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876398');
INSERT INTO `rnd_history` VALUES ('338', '25', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"14\",\"variety_index\":1,\"crop_type_id\":\"35\",\"variety_name\":\"S 35\",\"variety_type\":\"1\",\"principal_id\":\"4\",\"company_name\":\"\",\"number_of_seeds\":\"20\",\"quantity\":\"200\",\"characteristics\":\"gfhjbjk\",\"replica_status\":false,\"new_status\":1,\"st', 'UI-000037', 'INSERT', '1422876475');
INSERT INTO `rnd_history` VALUES ('339', '121', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":25,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876475,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876475');
INSERT INTO `rnd_history` VALUES ('340', '122', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":25,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876475,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876475');
INSERT INTO `rnd_history` VALUES ('341', '123', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":25,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876475,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876475');
INSERT INTO `rnd_history` VALUES ('342', '124', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":25,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876475,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876475');
INSERT INTO `rnd_history` VALUES ('343', '125', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":25,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876475,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876475');
INSERT INTO `rnd_history` VALUES ('344', '26', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"14\",\"variety_index\":2,\"crop_type_id\":\"36\",\"variety_name\":\"Sjgjk\",\"variety_type\":\"2\",\"principal_id\":\"\",\"company_name\":\"\",\"number_of_seeds\":\"10\",\"quantity\":\"30\",\"characteristics\":\"agduykgbn\",\"replica_status\":false,\"new_status\":1,\"s', 'UI-000037', 'INSERT', '1422876508');
INSERT INTO `rnd_history` VALUES ('345', '126', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":26,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876508,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876508');
INSERT INTO `rnd_history` VALUES ('346', '127', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":26,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876508,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876508');
INSERT INTO `rnd_history` VALUES ('347', '128', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":26,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876508,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876508');
INSERT INTO `rnd_history` VALUES ('348', '129', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":26,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876508,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876508');
INSERT INTO `rnd_history` VALUES ('349', '130', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":26,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876508,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876508');
INSERT INTO `rnd_history` VALUES ('350', '27', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"15\",\"variety_index\":1,\"crop_type_id\":\"37\",\"variety_name\":\"Ava\",\"variety_type\":\"1\",\"principal_id\":\"1\",\"company_name\":\"\",\"number_of_seeds\":\"20\",\"quantity\":\"30\",\"characteristics\":\"dgyktjhg\",\"replica_status\":false,\"new_status\":1,\"sta', 'UI-000037', 'INSERT', '1422876567');
INSERT INTO `rnd_history` VALUES ('351', '131', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":27,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876567,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876567');
INSERT INTO `rnd_history` VALUES ('352', '132', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":27,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876567,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876567');
INSERT INTO `rnd_history` VALUES ('353', '133', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":27,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876567,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876567');
INSERT INTO `rnd_history` VALUES ('354', '134', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":27,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876567,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876567');
INSERT INTO `rnd_history` VALUES ('355', '135', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":27,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876567,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876567');
INSERT INTO `rnd_history` VALUES ('356', '28', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"15\",\"variety_index\":2,\"crop_type_id\":\"38\",\"variety_name\":\"Sum\",\"variety_type\":\"1\",\"principal_id\":\"4\",\"company_name\":\"\",\"number_of_seeds\":\"30\",\"quantity\":\"200\",\"characteristics\":\"fcdyfjgb\",\"replica_status\":false,\"new_status\":1,\"st', 'UI-000037', 'INSERT', '1422876614');
INSERT INTO `rnd_history` VALUES ('357', '136', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":28,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876614,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876614');
INSERT INTO `rnd_history` VALUES ('358', '137', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":28,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876614,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876614');
INSERT INTO `rnd_history` VALUES ('359', '138', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":28,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876614,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876614');
INSERT INTO `rnd_history` VALUES ('360', '139', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":28,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876614,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876614');
INSERT INTO `rnd_history` VALUES ('361', '140', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":28,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876614,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876614');
INSERT INTO `rnd_history` VALUES ('362', '29', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"16\",\"variety_index\":1,\"crop_type_id\":\"39\",\"variety_name\":\"Deop\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"aci\",\"number_of_seeds\":\"45\",\"quantity\":\"390\",\"characteristics\":\"fcnghvcmh\",\"replica_status\":false,\"new_status\":1', 'UI-000037', 'INSERT', '1422876710');
INSERT INTO `rnd_history` VALUES ('363', '141', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":29,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876710,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876710');
INSERT INTO `rnd_history` VALUES ('364', '142', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":29,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876710,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876710');
INSERT INTO `rnd_history` VALUES ('365', '143', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":29,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876710,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876710');
INSERT INTO `rnd_history` VALUES ('366', '144', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":29,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876710,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876710');
INSERT INTO `rnd_history` VALUES ('367', '145', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":29,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876710,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876710');
INSERT INTO `rnd_history` VALUES ('368', '30', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"16\",\"variety_index\":2,\"crop_type_id\":\"39\",\"variety_name\":\"gfkyg\",\"variety_type\":\"2\",\"principal_id\":\"\",\"company_name\":\"\",\"number_of_seeds\":\"45\",\"quantity\":\"390\",\"characteristics\":\"chmvjb.\",\"replica_status\":false,\"new_status\":1,\"st', 'UI-000037', 'INSERT', '1422876765');
INSERT INTO `rnd_history` VALUES ('369', '146', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":30,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876765,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876765');
INSERT INTO `rnd_history` VALUES ('370', '147', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":30,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876765,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876765');
INSERT INTO `rnd_history` VALUES ('371', '148', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":30,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876765,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876765');
INSERT INTO `rnd_history` VALUES ('372', '149', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":30,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876765,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876765');
INSERT INTO `rnd_history` VALUES ('373', '150', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":30,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876765,\"season_id\":\"5\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876765');
INSERT INTO `rnd_history` VALUES ('374', '31', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"17\",\"variety_index\":1,\"crop_type_id\":\"40\",\"variety_name\":\"yguhk\",\"variety_type\":\"1\",\"principal_id\":\"5\",\"company_name\":\"\",\"number_of_seeds\":\"50\",\"quantity\":\"100\",\"characteristics\":\"fgjhb.k\",\"replica_status\":false,\"new_status\":1,\"s', 'UI-000037', 'INSERT', '1422876811');
INSERT INTO `rnd_history` VALUES ('375', '151', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":31,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876811,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876811');
INSERT INTO `rnd_history` VALUES ('376', '152', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":31,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876811,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876811');
INSERT INTO `rnd_history` VALUES ('377', '153', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":31,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876811,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876811');
INSERT INTO `rnd_history` VALUES ('378', '154', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":31,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876811,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876811');
INSERT INTO `rnd_history` VALUES ('379', '155', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":31,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876811,\"season_id\":\"5\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876811');
INSERT INTO `rnd_history` VALUES ('380', '32', 'rnd_variety', '{\"year\":\"2014\",\"crop_id\":\"17\",\"variety_index\":2,\"crop_type_id\":\"40\",\"variety_name\":\"R45\",\"variety_type\":\"3\",\"principal_id\":\"\",\"company_name\":\"Lal Teer\",\"number_of_seeds\":\"35\",\"quantity\":\"200\",\"characteristics\":\"fhfdgd\",\"replica_status\":false,\"new_status\":', 'UI-000037', 'INSERT', '1422876879');
INSERT INTO `rnd_history` VALUES ('381', '156', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":32,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876879,\"season_id\":\"1\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876879');
INSERT INTO `rnd_history` VALUES ('382', '157', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":32,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876879,\"season_id\":\"2\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876879');
INSERT INTO `rnd_history` VALUES ('383', '158', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":32,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876879,\"season_id\":\"3\",\"season_status\":1}', 'UI-000037', 'INSERT', '1422876879');
INSERT INTO `rnd_history` VALUES ('384', '159', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":32,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876879,\"season_id\":\"4\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876879');
INSERT INTO `rnd_history` VALUES ('385', '160', 'rnd_variety_season', '{\"year\":\"2014\",\"variety_id\":32,\"sample_delivery_status\":0,\"sample_size\":0,\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422876879,\"season_id\":\"5\",\"season_status\":0}', 'UI-000037', 'INSERT', '1422876879');
INSERT INTO `rnd_history` VALUES ('386', '1', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"estimated_delivery_date\":1423072800,\"created_by\":\"UI-000037\",\"creation_date\":1422876962}', 'UI-000037', 'INSERT', '1422876962');
INSERT INTO `rnd_history` VALUES ('387', '2', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"2\",\"crop_id\":\"1\",\"estimated_delivery_date\":1423072800,\"created_by\":\"UI-000037\",\"creation_date\":1422877009}', 'UI-000037', 'INSERT', '1422877009');
INSERT INTO `rnd_history` VALUES ('388', '1', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1422945994}', 'UI-000037', 'UPDATE', '1422945994');
INSERT INTO `rnd_history` VALUES ('389', '6', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1422945994}', 'UI-000037', 'UPDATE', '1422945994');
INSERT INTO `rnd_history` VALUES ('390', '3', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"2\",\"estimated_delivery_date\":1423072800,\"created_by\":\"UI-000037\",\"creation_date\":1422946073}', 'UI-000037', 'INSERT', '1422946073');
INSERT INTO `rnd_history` VALUES ('391', '4', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"5\",\"estimated_delivery_date\":1422727200,\"created_by\":\"UI-000037\",\"creation_date\":1422946114}', 'UI-000037', 'INSERT', '1422946114');
INSERT INTO `rnd_history` VALUES ('392', '31', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1422946148}', 'UI-000037', 'UPDATE', '1422946148');
INSERT INTO `rnd_history` VALUES ('393', '36', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1422946148}', 'UI-000037', 'UPDATE', '1422946148');
INSERT INTO `rnd_history` VALUES ('394', '1', 'delivery_and_sowing_setup', '{\"estimated_delivery_date\":1423072800,\"delivery_date\":1423072800,\"receive_date\":false,\"modified_by\":\"UI-000037\",\"modification_date\":1422946351}', 'UI-000037', 'UPDATE', '1422946351');
INSERT INTO `rnd_history` VALUES ('395', '4', 'delivery_and_sowing_setup', '{\"estimated_delivery_date\":1422727200,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"modified_by\":\"UI-000037\",\"modification_date\":1422946657}', 'UI-000037', 'UPDATE', '1422946657');
INSERT INTO `rnd_history` VALUES ('396', '3', 'delivery_and_sowing_setup', '{\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"modified_by\":\"UI-000037\",\"modification_date\":1422946685}', 'UI-000037', 'UPDATE', '1422946685');
INSERT INTO `rnd_history` VALUES ('397', '2', 'delivery_and_sowing_setup', '{\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"modified_by\":\"UI-000037\",\"modification_date\":1422946694}', 'UI-000037', 'UPDATE', '1422946694');
INSERT INTO `rnd_history` VALUES ('398', '1', 'delivery_and_sowing_setup', '{\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"modified_by\":\"UI-000037\",\"modification_date\":1422946707}', 'UI-000037', 'UPDATE', '1422946707');
INSERT INTO `rnd_history` VALUES ('399', '11', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1422946782}', 'UI-000037', 'UPDATE', '1422946782');
INSERT INTO `rnd_history` VALUES ('400', '16', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1422946782}', 'UI-000037', 'UPDATE', '1422946782');
INSERT INTO `rnd_history` VALUES ('401', '1', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1422946867}', 'UI-000037', 'UPDATE', '1422946867');
INSERT INTO `rnd_history` VALUES ('402', '1', 'delivery_and_sowing_setup', '{\"transplanting_date\":1426356000,\"modified_by\":\"UI-000037\",\"modification_date\":1422946894}', 'UI-000037', 'UPDATE', '1422946894');
INSERT INTO `rnd_history` VALUES ('403', '1', 'rnd_setup_image_fifteen_days', '{\"number_of_fifteendays\":\"3\",\"images\":\"{\\\"15\\\":\\\"no_image.jpg\\\",\\\"30\\\":\\\"no_image.jpg\\\",\\\"45\\\":\\\"no_image.jpg\\\"}\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"created_by\":\"UI-000037\",\"creation_date\":1423038111}', 'UI-000037', 'INSERT', '1423038111');
INSERT INTO `rnd_history` VALUES ('404', '5', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"4\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046091}', 'UI-000037', 'INSERT', '1423046091');
INSERT INTO `rnd_history` VALUES ('405', '21', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046127}', 'UI-000037', 'UPDATE', '1423046127');
INSERT INTO `rnd_history` VALUES ('406', '26', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046127}', 'UI-000037', 'UPDATE', '1423046127');
INSERT INTO `rnd_history` VALUES ('407', '6', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"6\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046211}', 'UI-000037', 'INSERT', '1423046211');
INSERT INTO `rnd_history` VALUES ('408', '7', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"7\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046233}', 'UI-000037', 'INSERT', '1423046233');
INSERT INTO `rnd_history` VALUES ('409', '8', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"8\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046252}', 'UI-000037', 'INSERT', '1423046252');
INSERT INTO `rnd_history` VALUES ('410', '9', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"9\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046270}', 'UI-000037', 'INSERT', '1423046270');
INSERT INTO `rnd_history` VALUES ('411', '10', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"10\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046298}', 'UI-000037', 'INSERT', '1423046298');
INSERT INTO `rnd_history` VALUES ('412', '11', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"11\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046317}', 'UI-000037', 'INSERT', '1423046317');
INSERT INTO `rnd_history` VALUES ('413', '12', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"12\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046332}', 'UI-000037', 'INSERT', '1423046332');
INSERT INTO `rnd_history` VALUES ('414', '13', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"13\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046350}', 'UI-000037', 'INSERT', '1423046350');
INSERT INTO `rnd_history` VALUES ('415', '14', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"14\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046369}', 'UI-000037', 'INSERT', '1423046369');
INSERT INTO `rnd_history` VALUES ('416', '15', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"15\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046387}', 'UI-000037', 'INSERT', '1423046387');
INSERT INTO `rnd_history` VALUES ('417', '16', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"17\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423046409}', 'UI-000037', 'INSERT', '1423046409');
INSERT INTO `rnd_history` VALUES ('418', '41', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046445}', 'UI-000037', 'UPDATE', '1423046445');
INSERT INTO `rnd_history` VALUES ('419', '46', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046445}', 'UI-000037', 'UPDATE', '1423046445');
INSERT INTO `rnd_history` VALUES ('420', '51', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046457}', 'UI-000037', 'UPDATE', '1423046457');
INSERT INTO `rnd_history` VALUES ('421', '56', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046457}', 'UI-000037', 'UPDATE', '1423046457');
INSERT INTO `rnd_history` VALUES ('422', '61', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046465}', 'UI-000037', 'UPDATE', '1423046465');
INSERT INTO `rnd_history` VALUES ('423', '66', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046465}', 'UI-000037', 'UPDATE', '1423046465');
INSERT INTO `rnd_history` VALUES ('424', '71', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046483}', 'UI-000037', 'UPDATE', '1423046483');
INSERT INTO `rnd_history` VALUES ('425', '76', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046483}', 'UI-000037', 'UPDATE', '1423046483');
INSERT INTO `rnd_history` VALUES ('426', '81', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046491}', 'UI-000037', 'UPDATE', '1423046491');
INSERT INTO `rnd_history` VALUES ('427', '86', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046491}', 'UI-000037', 'UPDATE', '1423046491');
INSERT INTO `rnd_history` VALUES ('428', '91', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046502}', 'UI-000037', 'UPDATE', '1423046502');
INSERT INTO `rnd_history` VALUES ('429', '96', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046502}', 'UI-000037', 'UPDATE', '1423046502');
INSERT INTO `rnd_history` VALUES ('430', '101', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046512}', 'UI-000037', 'UPDATE', '1423046512');
INSERT INTO `rnd_history` VALUES ('431', '111', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046512}', 'UI-000037', 'UPDATE', '1423046512');
INSERT INTO `rnd_history` VALUES ('432', '106', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046526}', 'UI-000037', 'UPDATE', '1423046526');
INSERT INTO `rnd_history` VALUES ('433', '116', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046526}', 'UI-000037', 'UPDATE', '1423046526');
INSERT INTO `rnd_history` VALUES ('434', '121', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046541}', 'UI-000037', 'UPDATE', '1423046541');
INSERT INTO `rnd_history` VALUES ('435', '126', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046541}', 'UI-000037', 'UPDATE', '1423046542');
INSERT INTO `rnd_history` VALUES ('436', '131', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046549}', 'UI-000037', 'UPDATE', '1423046549');
INSERT INTO `rnd_history` VALUES ('437', '136', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046549}', 'UI-000037', 'UPDATE', '1423046549');
INSERT INTO `rnd_history` VALUES ('438', '151', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046556}', 'UI-000037', 'UPDATE', '1423046556');
INSERT INTO `rnd_history` VALUES ('439', '156', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423046556}', 'UI-000037', 'UPDATE', '1423046556');
INSERT INTO `rnd_history` VALUES ('440', '3', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047293}', 'UI-000037', 'UPDATE', '1423047293');
INSERT INTO `rnd_history` VALUES ('441', '4', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047309}', 'UI-000037', 'UPDATE', '1423047309');
INSERT INTO `rnd_history` VALUES ('442', '5', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047320}', 'UI-000037', 'UPDATE', '1423047320');
INSERT INTO `rnd_history` VALUES ('443', '6', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047332}', 'UI-000037', 'UPDATE', '1423047332');
INSERT INTO `rnd_history` VALUES ('444', '7', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047459}', 'UI-000037', 'UPDATE', '1423047459');
INSERT INTO `rnd_history` VALUES ('445', '8', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047468}', 'UI-000037', 'UPDATE', '1423047468');
INSERT INTO `rnd_history` VALUES ('446', '9', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047478}', 'UI-000037', 'UPDATE', '1423047478');
INSERT INTO `rnd_history` VALUES ('447', '10', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047489}', 'UI-000037', 'UPDATE', '1423047489');
INSERT INTO `rnd_history` VALUES ('448', '11', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047498}', 'UI-000037', 'UPDATE', '1423047498');
INSERT INTO `rnd_history` VALUES ('449', '12', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047508}', 'UI-000037', 'UPDATE', '1423047508');
INSERT INTO `rnd_history` VALUES ('450', '13', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047517}', 'UI-000037', 'UPDATE', '1423047517');
INSERT INTO `rnd_history` VALUES ('451', '14', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047526}', 'UI-000037', 'UPDATE', '1423047526');
INSERT INTO `rnd_history` VALUES ('452', '15', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047534}', 'UI-000037', 'UPDATE', '1423047534');
INSERT INTO `rnd_history` VALUES ('453', '16', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1424368800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047543}', 'UI-000037', 'UPDATE', '1423047543');
INSERT INTO `rnd_history` VALUES ('454', '3', 'delivery_and_sowing_setup', '{\"transplanting_date\":1426356000,\"modified_by\":\"UI-000037\",\"modification_date\":1423047575}', 'UI-000037', 'UPDATE', '1423047575');
INSERT INTO `rnd_history` VALUES ('455', '4', 'delivery_and_sowing_setup', '{\"transplanting_date\":1426788000,\"modified_by\":\"UI-000037\",\"modification_date\":1423047592}', 'UI-000037', 'UPDATE', '1423047592');
INSERT INTO `rnd_history` VALUES ('456', '5', 'delivery_and_sowing_setup', '{\"transplanting_date\":1426788000,\"modified_by\":\"UI-000037\",\"modification_date\":1423047604}', 'UI-000037', 'UPDATE', '1423047604');
INSERT INTO `rnd_history` VALUES ('457', '6', 'delivery_and_sowing_setup', '{\"transplanting_date\":1426960800,\"modified_by\":\"UI-000037\",\"modification_date\":1423047620}', 'UI-000037', 'UPDATE', '1423047620');
INSERT INTO `rnd_history` VALUES ('458', '2', 'rnd_setup_image_fifteen_days', '{\"number_of_fifteendays\":\"5\",\"images\":\"{\\\"15\\\":\\\"deer.JPG\\\",\\\"30\\\":\\\"Copy_of_Copy_of_Have_a_nice_day.gif\\\",\\\"45\\\":\\\"bone.jpg\\\",\\\"60\\\":\\\"bat.jpg\\\",\\\"75\\\":\\\"bluebird.jpg\\\"}\",\"year\":\"2015\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"created_by\":\"UI-000', 'UI-000037', 'INSERT', '1423055462');
INSERT INTO `rnd_history` VALUES ('459', '2', 'rnd_setup_image_fifteen_days', '{\"number_of_fifteendays\":\"5\",\"images\":\"{\\\"15\\\":\\\"deer.JPG\\\",\\\"30\\\":\\\"35136.JPG\\\",\\\"45\\\":\\\"bone.jpg\\\",\\\"60\\\":\\\"bat.jpg\\\",\\\"75\\\":\\\"bluebird.jpg\\\"}\",\"modified_by\":\"UI-000037\",\"modification_date\":1423055487}', 'UI-000037', 'UPDATE', '1423055487');
INSERT INTO `rnd_history` VALUES ('460', '1', 'rnd_setup_image_fifteen_days', '{\"number_of_fifteendays\":\"3\",\"images\":\"{\\\"15\\\":\\\"anaconda.jpg\\\",\\\"30\\\":\\\"IMG0018.JPG\\\",\\\"45\\\":\\\"bacteria.jpg\\\"}\",\"modified_by\":\"UI-000037\",\"modification_date\":1423055656}', 'UI-000037', 'UPDATE', '1423055656');
INSERT INTO `rnd_history` VALUES ('461', '20', 'rnd_crop', '{\"crop_name\":\"Broccoli\",\"crop_code\":\"BR\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"2\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('462', '21', 'rnd_setup_text_fifteen_days', '{\"crop_id\":20,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('463', '21', 'rnd_setup_text_flowering', '{\"crop_id\":20,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('464', '21', 'rnd_setup_text_fruit', '{\"crop_id\":20,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('465', '21', 'rnd_setup_text_harvest', '{\"crop_id\":20,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('466', '21', 'rnd_setup_text_harvest_compile', '{\"crop_id\":20,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('467', '21', 'rnd_setup_text_yield', '{\"crop_id\":20,\"created_by\":\"UI-000037\",\"creation_date\":1423284645}', 'UI-000037', 'INSERT', '1423284645');
INSERT INTO `rnd_history` VALUES ('468', '21', 'rnd_crop', '{\"crop_name\":\"Chinese Cabbage\",\"crop_code\":\"CC\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"5\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('469', '22', 'rnd_setup_text_fifteen_days', '{\"crop_id\":21,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('470', '22', 'rnd_setup_text_flowering', '{\"crop_id\":21,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('471', '22', 'rnd_setup_text_fruit', '{\"crop_id\":21,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('472', '22', 'rnd_setup_text_harvest', '{\"crop_id\":21,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('473', '22', 'rnd_setup_text_harvest_compile', '{\"crop_id\":21,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('474', '22', 'rnd_setup_text_yield', '{\"crop_id\":21,\"created_by\":\"UI-000037\",\"creation_date\":1423284759}', 'UI-000037', 'INSERT', '1423284759');
INSERT INTO `rnd_history` VALUES ('475', '22', 'rnd_crop', '{\"crop_name\":\"Turnip\",\"crop_code\":\"TR\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"5\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('476', '23', 'rnd_setup_text_fifteen_days', '{\"crop_id\":22,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('477', '23', 'rnd_setup_text_flowering', '{\"crop_id\":22,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('478', '23', 'rnd_setup_text_fruit', '{\"crop_id\":22,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('479', '23', 'rnd_setup_text_harvest', '{\"crop_id\":22,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('480', '23', 'rnd_setup_text_harvest_compile', '{\"crop_id\":22,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('481', '23', 'rnd_setup_text_yield', '{\"crop_id\":22,\"created_by\":\"UI-000037\",\"creation_date\":1423284842}', 'UI-000037', 'INSERT', '1423284842');
INSERT INTO `rnd_history` VALUES ('482', '23', 'rnd_crop', '{\"crop_name\":\"Beet Root\",\"crop_code\":\"BRT\",\"crop_width\":\"3.5\",\"crop_height\":\"25.5\",\"fruit_type\":\"5\",\"sample_size\":\"1\",\"initial_plants\":\"30\",\"plants_per_hectare\":\"37037\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('483', '24', 'rnd_setup_text_fifteen_days', '{\"crop_id\":23,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('484', '24', 'rnd_setup_text_flowering', '{\"crop_id\":23,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('485', '24', 'rnd_setup_text_fruit', '{\"crop_id\":23,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('486', '24', 'rnd_setup_text_harvest', '{\"crop_id\":23,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('487', '24', 'rnd_setup_text_harvest_compile', '{\"crop_id\":23,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('488', '24', 'rnd_setup_text_yield', '{\"crop_id\":23,\"created_by\":\"UI-000037\",\"creation_date\":1423284986}', 'UI-000037', 'INSERT', '1423284986');
INSERT INTO `rnd_history` VALUES ('489', '24', 'rnd_crop', '{\"crop_name\":\"Spinach\",\"crop_code\":\"SP\",\"crop_width\":\"3.5\",\"crop_height\":\"33\",\"fruit_type\":\"4\",\"sample_size\":\"10\",\"initial_plants\":\"360\",\"plants_per_hectare\":\"100000\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('490', '25', 'rnd_setup_text_fifteen_days', '{\"crop_id\":24,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('491', '25', 'rnd_setup_text_flowering', '{\"crop_id\":24,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('492', '25', 'rnd_setup_text_fruit', '{\"crop_id\":24,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('493', '25', 'rnd_setup_text_harvest', '{\"crop_id\":24,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('494', '25', 'rnd_setup_text_harvest_compile', '{\"crop_id\":24,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('495', '25', 'rnd_setup_text_yield', '{\"crop_id\":24,\"created_by\":\"UI-000037\",\"creation_date\":1423285115}', 'UI-000037', 'INSERT', '1423285115');
INSERT INTO `rnd_history` VALUES ('496', '1', 'rnd_crop', '{\"ordering\":\"2\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285126}', 'UI-000037', 'UPDATE', '1423285126');
INSERT INTO `rnd_history` VALUES ('497', '2', 'rnd_crop', '{\"ordering\":\"6\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285151}', 'UI-000037', 'UPDATE', '1423285151');
INSERT INTO `rnd_history` VALUES ('498', '2', 'rnd_crop', '{\"ordering\":\"6\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285152}', 'UI-000037', 'UPDATE', '1423285152');
INSERT INTO `rnd_history` VALUES ('499', '3', 'rnd_crop', '{\"ordering\":\"10\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285203}', 'UI-000037', 'UPDATE', '1423285203');
INSERT INTO `rnd_history` VALUES ('500', '3', 'rnd_crop', '{\"ordering\":\"10\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285204}', 'UI-000037', 'UPDATE', '1423285204');
INSERT INTO `rnd_history` VALUES ('501', '20', 'rnd_crop', '{\"ordering\":\"4\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285218}', 'UI-000037', 'UPDATE', '1423285218');
INSERT INTO `rnd_history` VALUES ('502', '20', 'rnd_crop', '{\"ordering\":\"4\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285219}', 'UI-000037', 'UPDATE', '1423285219');
INSERT INTO `rnd_history` VALUES ('503', '20', 'rnd_crop', '{\"ordering\":\"4\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285220}', 'UI-000037', 'UPDATE', '1423285220');
INSERT INTO `rnd_history` VALUES ('504', '21', 'rnd_crop', '{\"ordering\":\"8\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285237}', 'UI-000037', 'UPDATE', '1423285237');
INSERT INTO `rnd_history` VALUES ('505', '21', 'rnd_crop', '{\"ordering\":\"8\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285238}', 'UI-000037', 'UPDATE', '1423285238');
INSERT INTO `rnd_history` VALUES ('506', '21', 'rnd_crop', '{\"ordering\":\"8\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285239}', 'UI-000037', 'UPDATE', '1423285239');
INSERT INTO `rnd_history` VALUES ('507', '21', 'rnd_crop', '{\"ordering\":\"8\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285240}', 'UI-000037', 'UPDATE', '1423285240');
INSERT INTO `rnd_history` VALUES ('508', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285270}', 'UI-000037', 'UPDATE', '1423285270');
INSERT INTO `rnd_history` VALUES ('509', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285271}', 'UI-000037', 'UPDATE', '1423285271');
INSERT INTO `rnd_history` VALUES ('510', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285272}', 'UI-000037', 'UPDATE', '1423285272');
INSERT INTO `rnd_history` VALUES ('511', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285273}', 'UI-000037', 'UPDATE', '1423285273');
INSERT INTO `rnd_history` VALUES ('512', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285274}', 'UI-000037', 'UPDATE', '1423285274');
INSERT INTO `rnd_history` VALUES ('513', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285275}', 'UI-000037', 'UPDATE', '1423285275');
INSERT INTO `rnd_history` VALUES ('514', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285276}', 'UI-000037', 'UPDATE', '1423285276');
INSERT INTO `rnd_history` VALUES ('515', '22', 'rnd_crop', '{\"ordering\":\"12\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285277}', 'UI-000037', 'UPDATE', '1423285277');
INSERT INTO `rnd_history` VALUES ('516', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285288}', 'UI-000037', 'UPDATE', '1423285288');
INSERT INTO `rnd_history` VALUES ('517', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285289}', 'UI-000037', 'UPDATE', '1423285289');
INSERT INTO `rnd_history` VALUES ('518', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285290}', 'UI-000037', 'UPDATE', '1423285290');
INSERT INTO `rnd_history` VALUES ('519', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285291}', 'UI-000037', 'UPDATE', '1423285291');
INSERT INTO `rnd_history` VALUES ('520', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285292}', 'UI-000037', 'UPDATE', '1423285292');
INSERT INTO `rnd_history` VALUES ('521', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285293}', 'UI-000037', 'UPDATE', '1423285293');
INSERT INTO `rnd_history` VALUES ('522', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285294}', 'UI-000037', 'UPDATE', '1423285294');
INSERT INTO `rnd_history` VALUES ('523', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285295}', 'UI-000037', 'UPDATE', '1423285295');
INSERT INTO `rnd_history` VALUES ('524', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285296}', 'UI-000037', 'UPDATE', '1423285296');
INSERT INTO `rnd_history` VALUES ('525', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285297}', 'UI-000037', 'UPDATE', '1423285297');
INSERT INTO `rnd_history` VALUES ('526', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285298}', 'UI-000037', 'UPDATE', '1423285298');
INSERT INTO `rnd_history` VALUES ('527', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285299}', 'UI-000037', 'UPDATE', '1423285299');
INSERT INTO `rnd_history` VALUES ('528', '23', 'rnd_crop', '{\"ordering\":\"14\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285300}', 'UI-000037', 'UPDATE', '1423285300');
INSERT INTO `rnd_history` VALUES ('529', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285318}', 'UI-000037', 'UPDATE', '1423285318');
INSERT INTO `rnd_history` VALUES ('530', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285319}', 'UI-000037', 'UPDATE', '1423285319');
INSERT INTO `rnd_history` VALUES ('531', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285320}', 'UI-000037', 'UPDATE', '1423285320');
INSERT INTO `rnd_history` VALUES ('532', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285321}', 'UI-000037', 'UPDATE', '1423285321');
INSERT INTO `rnd_history` VALUES ('533', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285322}', 'UI-000037', 'UPDATE', '1423285322');
INSERT INTO `rnd_history` VALUES ('534', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285323}', 'UI-000037', 'UPDATE', '1423285323');
INSERT INTO `rnd_history` VALUES ('535', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285324}', 'UI-000037', 'UPDATE', '1423285324');
INSERT INTO `rnd_history` VALUES ('536', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285325}', 'UI-000037', 'UPDATE', '1423285325');
INSERT INTO `rnd_history` VALUES ('537', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285326}', 'UI-000037', 'UPDATE', '1423285326');
INSERT INTO `rnd_history` VALUES ('538', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285327}', 'UI-000037', 'UPDATE', '1423285327');
INSERT INTO `rnd_history` VALUES ('539', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285328}', 'UI-000037', 'UPDATE', '1423285328');
INSERT INTO `rnd_history` VALUES ('540', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285329}', 'UI-000037', 'UPDATE', '1423285329');
INSERT INTO `rnd_history` VALUES ('541', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285330}', 'UI-000037', 'UPDATE', '1423285330');
INSERT INTO `rnd_history` VALUES ('542', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285331}', 'UI-000037', 'UPDATE', '1423285331');
INSERT INTO `rnd_history` VALUES ('543', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285332}', 'UI-000037', 'UPDATE', '1423285332');
INSERT INTO `rnd_history` VALUES ('544', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285333}', 'UI-000037', 'UPDATE', '1423285333');
INSERT INTO `rnd_history` VALUES ('545', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285334}', 'UI-000037', 'UPDATE', '1423285334');
INSERT INTO `rnd_history` VALUES ('546', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285335}', 'UI-000037', 'UPDATE', '1423285335');
INSERT INTO `rnd_history` VALUES ('547', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285336}', 'UI-000037', 'UPDATE', '1423285336');
INSERT INTO `rnd_history` VALUES ('548', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285337}', 'UI-000037', 'UPDATE', '1423285337');
INSERT INTO `rnd_history` VALUES ('549', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285338}', 'UI-000037', 'UPDATE', '1423285338');
INSERT INTO `rnd_history` VALUES ('550', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285339}', 'UI-000037', 'UPDATE', '1423285339');
INSERT INTO `rnd_history` VALUES ('551', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285340}', 'UI-000037', 'UPDATE', '1423285340');
INSERT INTO `rnd_history` VALUES ('552', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285341}', 'UI-000037', 'UPDATE', '1423285341');
INSERT INTO `rnd_history` VALUES ('553', '24', 'rnd_crop', '{\"ordering\":\"16\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285342}', 'UI-000037', 'UPDATE', '1423285342');
INSERT INTO `rnd_history` VALUES ('554', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285349}', 'UI-000037', 'UPDATE', '1423285349');
INSERT INTO `rnd_history` VALUES ('555', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285350}', 'UI-000037', 'UPDATE', '1423285350');
INSERT INTO `rnd_history` VALUES ('556', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285351}', 'UI-000037', 'UPDATE', '1423285351');
INSERT INTO `rnd_history` VALUES ('557', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285352}', 'UI-000037', 'UPDATE', '1423285352');
INSERT INTO `rnd_history` VALUES ('558', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285353}', 'UI-000037', 'UPDATE', '1423285353');
INSERT INTO `rnd_history` VALUES ('559', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285354}', 'UI-000037', 'UPDATE', '1423285354');
INSERT INTO `rnd_history` VALUES ('560', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285355}', 'UI-000037', 'UPDATE', '1423285355');
INSERT INTO `rnd_history` VALUES ('561', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285356}', 'UI-000037', 'UPDATE', '1423285356');
INSERT INTO `rnd_history` VALUES ('562', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285357}', 'UI-000037', 'UPDATE', '1423285357');
INSERT INTO `rnd_history` VALUES ('563', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285358}', 'UI-000037', 'UPDATE', '1423285358');
INSERT INTO `rnd_history` VALUES ('564', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285359}', 'UI-000037', 'UPDATE', '1423285359');
INSERT INTO `rnd_history` VALUES ('565', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285360}', 'UI-000037', 'UPDATE', '1423285360');
INSERT INTO `rnd_history` VALUES ('566', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285361}', 'UI-000037', 'UPDATE', '1423285361');
INSERT INTO `rnd_history` VALUES ('567', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285362}', 'UI-000037', 'UPDATE', '1423285362');
INSERT INTO `rnd_history` VALUES ('568', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285363}', 'UI-000037', 'UPDATE', '1423285363');
INSERT INTO `rnd_history` VALUES ('569', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285364}', 'UI-000037', 'UPDATE', '1423285364');
INSERT INTO `rnd_history` VALUES ('570', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285365}', 'UI-000037', 'UPDATE', '1423285365');
INSERT INTO `rnd_history` VALUES ('571', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285366}', 'UI-000037', 'UPDATE', '1423285366');
INSERT INTO `rnd_history` VALUES ('572', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285367}', 'UI-000037', 'UPDATE', '1423285367');
INSERT INTO `rnd_history` VALUES ('573', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285368}', 'UI-000037', 'UPDATE', '1423285368');
INSERT INTO `rnd_history` VALUES ('574', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285369}', 'UI-000037', 'UPDATE', '1423285369');
INSERT INTO `rnd_history` VALUES ('575', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285370}', 'UI-000037', 'UPDATE', '1423285370');
INSERT INTO `rnd_history` VALUES ('576', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285371}', 'UI-000037', 'UPDATE', '1423285371');
INSERT INTO `rnd_history` VALUES ('577', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285372}', 'UI-000037', 'UPDATE', '1423285372');
INSERT INTO `rnd_history` VALUES ('578', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285373}', 'UI-000037', 'UPDATE', '1423285373');
INSERT INTO `rnd_history` VALUES ('579', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285374}', 'UI-000037', 'UPDATE', '1423285374');
INSERT INTO `rnd_history` VALUES ('580', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285375}', 'UI-000037', 'UPDATE', '1423285375');
INSERT INTO `rnd_history` VALUES ('581', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285376}', 'UI-000037', 'UPDATE', '1423285376');
INSERT INTO `rnd_history` VALUES ('582', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285377}', 'UI-000037', 'UPDATE', '1423285377');
INSERT INTO `rnd_history` VALUES ('583', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285378}', 'UI-000037', 'UPDATE', '1423285378');
INSERT INTO `rnd_history` VALUES ('584', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285379}', 'UI-000037', 'UPDATE', '1423285379');
INSERT INTO `rnd_history` VALUES ('585', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285380}', 'UI-000037', 'UPDATE', '1423285380');
INSERT INTO `rnd_history` VALUES ('586', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285381}', 'UI-000037', 'UPDATE', '1423285381');
INSERT INTO `rnd_history` VALUES ('587', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285382}', 'UI-000037', 'UPDATE', '1423285382');
INSERT INTO `rnd_history` VALUES ('588', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285383}', 'UI-000037', 'UPDATE', '1423285383');
INSERT INTO `rnd_history` VALUES ('589', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285384}', 'UI-000037', 'UPDATE', '1423285384');
INSERT INTO `rnd_history` VALUES ('590', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285385}', 'UI-000037', 'UPDATE', '1423285385');
INSERT INTO `rnd_history` VALUES ('591', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285386}', 'UI-000037', 'UPDATE', '1423285386');
INSERT INTO `rnd_history` VALUES ('592', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285387}', 'UI-000037', 'UPDATE', '1423285387');
INSERT INTO `rnd_history` VALUES ('593', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285388}', 'UI-000037', 'UPDATE', '1423285388');
INSERT INTO `rnd_history` VALUES ('594', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285389}', 'UI-000037', 'UPDATE', '1423285389');
INSERT INTO `rnd_history` VALUES ('595', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285390}', 'UI-000037', 'UPDATE', '1423285390');
INSERT INTO `rnd_history` VALUES ('596', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285391}', 'UI-000037', 'UPDATE', '1423285391');
INSERT INTO `rnd_history` VALUES ('597', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285392}', 'UI-000037', 'UPDATE', '1423285392');
INSERT INTO `rnd_history` VALUES ('598', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285393}', 'UI-000037', 'UPDATE', '1423285393');
INSERT INTO `rnd_history` VALUES ('599', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285394}', 'UI-000037', 'UPDATE', '1423285394');
INSERT INTO `rnd_history` VALUES ('600', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285398}', 'UI-000037', 'UPDATE', '1423285398');
INSERT INTO `rnd_history` VALUES ('601', '4', 'rnd_crop', '{\"ordering\":\"18\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285401}', 'UI-000037', 'UPDATE', '1423285401');
INSERT INTO `rnd_history` VALUES ('602', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285409}', 'UI-000037', 'UPDATE', '1423285409');
INSERT INTO `rnd_history` VALUES ('603', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285410}', 'UI-000037', 'UPDATE', '1423285410');
INSERT INTO `rnd_history` VALUES ('604', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285411}', 'UI-000037', 'UPDATE', '1423285411');
INSERT INTO `rnd_history` VALUES ('605', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285412}', 'UI-000037', 'UPDATE', '1423285412');
INSERT INTO `rnd_history` VALUES ('606', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285413}', 'UI-000037', 'UPDATE', '1423285413');
INSERT INTO `rnd_history` VALUES ('607', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285414}', 'UI-000037', 'UPDATE', '1423285414');
INSERT INTO `rnd_history` VALUES ('608', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285415}', 'UI-000037', 'UPDATE', '1423285415');
INSERT INTO `rnd_history` VALUES ('609', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285416}', 'UI-000037', 'UPDATE', '1423285416');
INSERT INTO `rnd_history` VALUES ('610', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285417}', 'UI-000037', 'UPDATE', '1423285417');
INSERT INTO `rnd_history` VALUES ('611', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285418}', 'UI-000037', 'UPDATE', '1423285418');
INSERT INTO `rnd_history` VALUES ('612', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285419}', 'UI-000037', 'UPDATE', '1423285419');
INSERT INTO `rnd_history` VALUES ('613', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285420}', 'UI-000037', 'UPDATE', '1423285420');
INSERT INTO `rnd_history` VALUES ('614', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285421}', 'UI-000037', 'UPDATE', '1423285421');
INSERT INTO `rnd_history` VALUES ('615', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285422}', 'UI-000037', 'UPDATE', '1423285422');
INSERT INTO `rnd_history` VALUES ('616', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285423}', 'UI-000037', 'UPDATE', '1423285423');
INSERT INTO `rnd_history` VALUES ('617', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285424}', 'UI-000037', 'UPDATE', '1423285424');
INSERT INTO `rnd_history` VALUES ('618', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285425}', 'UI-000037', 'UPDATE', '1423285425');
INSERT INTO `rnd_history` VALUES ('619', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285426}', 'UI-000037', 'UPDATE', '1423285426');
INSERT INTO `rnd_history` VALUES ('620', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285427}', 'UI-000037', 'UPDATE', '1423285427');
INSERT INTO `rnd_history` VALUES ('621', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285428}', 'UI-000037', 'UPDATE', '1423285428');
INSERT INTO `rnd_history` VALUES ('622', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285429}', 'UI-000037', 'UPDATE', '1423285429');
INSERT INTO `rnd_history` VALUES ('623', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285430}', 'UI-000037', 'UPDATE', '1423285430');
INSERT INTO `rnd_history` VALUES ('624', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285431}', 'UI-000037', 'UPDATE', '1423285431');
INSERT INTO `rnd_history` VALUES ('625', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285432}', 'UI-000037', 'UPDATE', '1423285432');
INSERT INTO `rnd_history` VALUES ('626', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285433}', 'UI-000037', 'UPDATE', '1423285433');
INSERT INTO `rnd_history` VALUES ('627', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285434}', 'UI-000037', 'UPDATE', '1423285434');
INSERT INTO `rnd_history` VALUES ('628', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285435}', 'UI-000037', 'UPDATE', '1423285435');
INSERT INTO `rnd_history` VALUES ('629', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285436}', 'UI-000037', 'UPDATE', '1423285436');
INSERT INTO `rnd_history` VALUES ('630', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285437}', 'UI-000037', 'UPDATE', '1423285437');
INSERT INTO `rnd_history` VALUES ('631', '5', 'rnd_crop', '{\"ordering\":\"20\",\"modified_by\":\"UI-000037\",\"modification_date\":1423285438}', 'UI-000037', 'UPDATE', '1423285438');
INSERT INTO `rnd_history` VALUES ('632', '1', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"estimated_delivery_date\":1423072800,\"delivery_date\":1423504800,\"receive_date\":1423677600,\"created_by\":\"UI-000037\",\"creation_date\":1423285638}', 'UI-000037', 'INSERT', '1423285638');
INSERT INTO `rnd_history` VALUES ('633', '1', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1423504800,\"modified_by\":\"UI-000037\",\"modification_date\":1423285651}', 'UI-000037', 'UPDATE', '1423285651');
INSERT INTO `rnd_history` VALUES ('634', '2', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"estimated_delivery_date\":1391536800,\"delivery_date\":1391968800,\"receive_date\":1392141600,\"created_by\":\"UI-000037\",\"creation_date\":1423370581}', 'UI-000037', 'INSERT', '1423370581');
INSERT INTO `rnd_history` VALUES ('635', '1', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423370642,\"sample_size\":\"1\"}', 'UI-000037', 'UPDATE', '1423370642');
INSERT INTO `rnd_history` VALUES ('636', '6', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423370642,\"sample_size\":\"1\"}', 'UI-000037', 'UPDATE', '1423370642');
INSERT INTO `rnd_history` VALUES ('637', '2', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1393264800,\"modified_by\":\"UI-000037\",\"modification_date\":1423370750}', 'UI-000037', 'UPDATE', '1423370750');
INSERT INTO `rnd_history` VALUES ('638', '1', 'rnd_setup_image_fifteen_days', '{\"number_of_fifteendays\":\"4\",\"images\":\"{\\\"15\\\":\\\"1440_900_20110926042759454625.jpg\\\",\\\"30\\\":\\\"CF_6.jpg\\\",\\\"45\\\":\\\"CF_CK_2.jpg\\\",\\\"60\\\":\\\"CF_CK_3.jpg\\\"}\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"created_by\":\"UI-000037\",\"creation_date', 'UI-000037', 'INSERT', '1423371083');
INSERT INTO `rnd_history` VALUES ('639', '1', 'rnd_data_image_fifteen_days', '{\"images\":\"{\\\"normal\\\":\\\"CF_3.jpg\\\",\\\"replica\\\":\\\"no_image.jpg\\\"}\",\"remarks\":\"\",\"variety_id\":\"1\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"day_number\":\"30\",\"created_by\":\"UI-000037\",\"creation_date\":1423371403}', 'UI-000037', 'INSERT', '1423371403');
INSERT INTO `rnd_history` VALUES ('640', '2', 'rnd_data_image_fifteen_days', '{\"images\":\"{\\\"normal\\\":\\\"CF_CK_3.jpg\\\",\\\"replica\\\":\\\"no_image.jpg\\\"}\",\"remarks\":\"\",\"variety_id\":\"2\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"day_number\":\"30\",\"created_by\":\"UI-000037\",\"creation_date\":1423371403}', 'UI-000037', 'INSERT', '1423371403');
INSERT INTO `rnd_history` VALUES ('641', '3', 'rnd_data_image_fifteen_days', '{\"images\":\"{\\\"normal\\\":\\\"CF_1.jpg\\\",\\\"replica\\\":\\\"no_image.jpg\\\"}\",\"remarks\":\"dfvdfgdfg\",\"variety_id\":\"1\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"day_number\":\"15\",\"created_by\":\"UI-000037\",\"creation_date\":1423371467}', 'UI-000037', 'INSERT', '1423371467');
INSERT INTO `rnd_history` VALUES ('642', '4', 'rnd_data_image_fifteen_days', '{\"images\":\"{\\\"normal\\\":\\\"CF_2.jpg\\\",\\\"replica\\\":\\\"no_image.jpg\\\"}\",\"remarks\":\"bgfgbfgdf\",\"variety_id\":\"2\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"day_number\":\"15\",\"created_by\":\"UI-000037\",\"creation_date\":1423371467}', 'UI-000037', 'INSERT', '1423371467');
INSERT INTO `rnd_history` VALUES ('643', '1', 'rnd_data_text_fifteen_days', '{\"info\":\"{\\\"normal\\\":{\\\"plant_type_appearance\\\":\\\"5\\\",\\\"plant_uniformity\\\":\\\"6\\\",\\\"distance_from_ground_to_curd\\\":\\\"3\\\",\\\"curd_type\\\":\\\"2\\\",\\\"curd_colour\\\":\\\"5\\\",\\\"curd_compactness\\\":\\\"5\\\",\\\"curd_uniformity\\\":\\\"6\\\",\\\"disease_sustainability\\\":\\\"4\\\",\\\"adapt', 'UI-000037', 'INSERT', '1423372598');
INSERT INTO `rnd_history` VALUES ('644', '2', 'rnd_data_text_fifteen_days', '{\"info\":\"{\\\"normal\\\":{\\\"plant_type_appearance\\\":\\\"4\\\",\\\"plant_uniformity\\\":\\\"5\\\",\\\"distance_from_ground_to_curd\\\":\\\"5\\\",\\\"curd_type\\\":\\\"1\\\",\\\"curd_colour\\\":\\\"3\\\",\\\"curd_compactness\\\":\\\"7\\\",\\\"curd_uniformity\\\":\\\"5\\\",\\\"disease_sustainability\\\":\\\"5\\\",\\\"adapt', 'UI-000037', 'INSERT', '1423372650');
INSERT INTO `rnd_history` VALUES ('645', '3', 'delivery_and_sowing_setup', '{\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"4\",\"estimated_delivery_date\":1391536800,\"delivery_date\":1391968800,\"receive_date\":1392141600,\"created_by\":\"UI-000037\",\"creation_date\":1423372759}', 'UI-000037', 'INSERT', '1423372759');
INSERT INTO `rnd_history` VALUES ('646', '21', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423372804,\"sample_size\":\"1\"}', 'UI-000037', 'UPDATE', '1423372804');
INSERT INTO `rnd_history` VALUES ('647', '26', 'rnd_variety_season', '{\"sample_delivery_status\":1,\"modified_by\":\"UI-000037\",\"modification_date\":1423372804,\"sample_size\":\"1\"}', 'UI-000037', 'UPDATE', '1423372804');
INSERT INTO `rnd_history` VALUES ('648', '3', 'delivery_and_sowing_setup', '{\"sowing_status\":\"1\",\"sowing_date\":1393264800,\"modified_by\":\"UI-000037\",\"modification_date\":1423372839}', 'UI-000037', 'UPDATE', '1423372839');
INSERT INTO `rnd_history` VALUES ('649', '2', 'rnd_setup_image_fifteen_days', '{\"number_of_fifteendays\":\"3\",\"images\":\"{\\\"15\\\":\\\"CF_4.jpg\\\",\\\"30\\\":\\\"CF_5.jpg\\\",\\\"45\\\":\\\"1440_900_201109260427594546251.jpg\\\"}\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"4\",\"crop_type_id\":\"10\",\"created_by\":\"UI-000037\",\"creation_date\":1423372951}', 'UI-000037', 'INSERT', '1423372951');
INSERT INTO `rnd_history` VALUES ('650', '3', 'rnd_data_text_fifteen_days', '{\"info\":\"{\\\"normal\\\":{\\\"plant_type_appearance\\\":\\\"5\\\",\\\"plant_uniformity\\\":\\\"5\\\",\\\"fruit_shape\\\":\\\"\\\",\\\"fruit_colour\\\":\\\"\\\",\\\"fruit_size\\\":\\\"\\\",\\\"fruit_bearing\\\":\\\"\\\",\\\"fruit_size_uniformity\\\":\\\"\\\",\\\"disease_sustainability\\\":\\\"6\\\",\\\"adaptability\\\":\\\"Soft ', 'UI-000037', 'INSERT', '1423373167');
INSERT INTO `rnd_history` VALUES ('651', '4', 'rnd_data_text_fifteen_days', '{\"info\":\"{\\\"normal\\\":{\\\"plant_type_appearance\\\":\\\"3\\\",\\\"plant_uniformity\\\":\\\"\\\",\\\"fruit_shape\\\":\\\"\\\",\\\"fruit_colour\\\":\\\"\\\",\\\"fruit_size\\\":\\\"\\\",\\\"fruit_bearing\\\":\\\"\\\",\\\"fruit_size_uniformity\\\":\\\"\\\",\\\"disease_sustainability\\\":\\\"5\\\",\\\"adaptability\\\":\\\"bvb\\\",', 'UI-000037', 'INSERT', '1423373190');
INSERT INTO `rnd_history` VALUES ('652', '1', 'rnd_setup_image_flowering', '{\"images\":\"{\\\"1\\\":\\\"CF_1.jpg\\\",\\\"2\\\":\\\"CF_CK_3.jpg\\\",\\\"3\\\":\\\"CF_4.jpg\\\",\\\"4\\\":\\\"CF_8.jpg\\\",\\\"5\\\":\\\"1440_900_20110926042759454625.jpg\\\",\\\"6\\\":\\\"CF_CK_8.jpg\\\"}\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"created_by\":\"UI-000037\",\"creatio', 'UI-000037', 'INSERT', '1423377424');
INSERT INTO `rnd_history` VALUES ('653', '1', 'rnd_setup_image_harvest_cropwise', '{\"images\":\"{\\\"1\\\":\\\"no_image.jpg\\\",\\\"2\\\":\\\"no_image.jpg\\\"}\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"created_by\":\"UI-000037\",\"creation_date\":1423399324}', 'UI-000037', 'INSERT', '1423399324');
INSERT INTO `rnd_history` VALUES ('654', '1', 'rnd_setup_image_fruit', '{\"images\":\"{\\\"1\\\":\\\"no_image.jpg\\\",\\\"2\\\":\\\"no_image.jpg\\\",\\\"3\\\":\\\"Desert.jpg\\\",\\\"4\\\":\\\"no_image.jpg\\\"}\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"1\",\"created_by\":\"UI-000037\",\"creation_date\":1423435803}', 'UI-000037', 'INSERT', '1423435803');
INSERT INTO `rnd_history` VALUES ('655', '1', 'rnd_setup_image_harvest_cropwise', '{\"images\":\"{\\\"1\\\":\\\"Koala.jpg\\\",\\\"2\\\":\\\"Penguins.jpg\\\"}\",\"modified_by\":\"UI-000037\",\"modification_date\":1423436019}', 'UI-000037', 'UPDATE', '1423436019');
INSERT INTO `rnd_history` VALUES ('656', '1', 'rnd_setup_image_harvest_cropwise', '{\"images\":\"{\\\"1\\\":\\\"CF_5.jpg\\\",\\\"2\\\":\\\"CF_CK_3.jpg\\\"}\",\"modified_by\":\"UI-000037\",\"modification_date\":1423470360}', 'UI-000037', 'UPDATE', '1423470360');
INSERT INTO `rnd_history` VALUES ('657', '1', 'rnd_data_image_harvest_cropwise', '{\"images\":\"{\\\"normal\\\":{\\\"1\\\":\\\"CF_8.jpg\\\",\\\"2\\\":\\\"1440_900_20110926042759454625.jpg\\\"},\\\"replica\\\":{\\\"1\\\":\\\"no_image.jpg\\\",\\\"2\\\":\\\"no_image.jpg\\\"}}\",\"remarks\":\"{\\\"1\\\":\\\"\\\",\\\"2\\\":\\\"\\\"}\",\"variety_id\":\"1\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_ty', 'UI-000037', 'INSERT', '1423470496');
INSERT INTO `rnd_history` VALUES ('658', '2', 'rnd_data_image_harvest_cropwise', '{\"images\":\"{\\\"normal\\\":{\\\"1\\\":\\\"CF_CK_2.jpg\\\",\\\"2\\\":\\\"CF_6.jpg\\\"},\\\"replica\\\":{\\\"1\\\":\\\"no_image.jpg\\\",\\\"2\\\":\\\"no_image.jpg\\\"}}\",\"remarks\":\"{\\\"1\\\":\\\"\\\",\\\"2\\\":\\\"\\\"}\",\"variety_id\":\"2\",\"year\":\"2014\",\"season_id\":\"1\",\"crop_id\":\"1\",\"crop_type_id\":\"2\",\"harvest_no', 'UI-000037', 'INSERT', '1423470496');
INSERT INTO `rnd_history` VALUES ('659', '21', 'rnd_setup_text_fifteen_days', '{\"sowing_date\":1,\"transplanting_date\":0,\"fortnightly_reporting_date\":0,\"initial_plants_during_trial_started\":0,\"plant_type_appearance\":0,\"plant_type\":0,\"plant_uniformity\":0,\"distance_from_ground_to_curd\":0,\"distance_from_ground_to_head\":0,\"distance_from_g', 'UI-000037', 'UPDATE', '1423529684');
INSERT INTO `rnd_history` VALUES ('660', '21', 'rnd_setup_text_fifteen_days', '{\"sowing_date\":0,\"transplanting_date\":0,\"fortnightly_reporting_date\":0,\"initial_plants_during_trial_started\":0,\"plant_type_appearance\":0,\"plant_type\":0,\"plant_uniformity\":0,\"distance_from_ground_to_curd\":0,\"distance_from_ground_to_head\":0,\"distance_from_g', 'UI-000037', 'UPDATE', '1423529725');
INSERT INTO `rnd_history` VALUES ('661', '1', 'rnd_data_text_fruit', '{\"info\":\"{\\\"normal\\\":{\\\"curd_type\\\":\\\"1\\\",\\\"curd_type_evaluation\\\":\\\"4\\\",\\\"curd_colour\\\":\\\"2\\\",\\\"curd_colour_evaluation\\\":\\\"4\\\",\\\"curd_weight\\\":\\\"12\\\",\\\"curd_weight_evaluation\\\":\\\"5\\\",\\\"curd_diameter\\\":\\\"43\\\",\\\"curd_diameter_evaluation\\\":\\\"3\\\",\\\"curd_heig', 'UI-000037', 'INSERT', '1423993880');
INSERT INTO `rnd_history` VALUES ('662', '1', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":1,\"total_curd_wt\":1,\"total_market_curds\":1,\"total_market_curd_wt\":1,\"percentage_of_mrkt_curd\":1,\"percentage_of_', 'UI-000037', 'UPDATE', '1424005485');
INSERT INTO `rnd_history` VALUES ('663', '20', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":1,\"total_curd_wt\":1,\"total_market_curds\":1,\"total_market_curd_wt\":1,\"percentage_of_mrkt_curd\":1,\"percentage_of_', 'UI-000037', 'UPDATE', '1424005611');
INSERT INTO `rnd_history` VALUES ('664', '2', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424005968');
INSERT INTO `rnd_history` VALUES ('665', '21', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424006135');
INSERT INTO `rnd_history` VALUES ('666', '3', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424006172');
INSERT INTO `rnd_history` VALUES ('667', '22', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424006287');
INSERT INTO `rnd_history` VALUES ('668', '4', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061466');
INSERT INTO `rnd_history` VALUES ('669', '5', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061522');
INSERT INTO `rnd_history` VALUES ('670', '6', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061562');
INSERT INTO `rnd_history` VALUES ('671', '7', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061600');
INSERT INTO `rnd_history` VALUES ('672', '8', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061638');
INSERT INTO `rnd_history` VALUES ('673', '9', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061690');
INSERT INTO `rnd_history` VALUES ('674', '10', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061755');
INSERT INTO `rnd_history` VALUES ('675', '11', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061836');
INSERT INTO `rnd_history` VALUES ('676', '12', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061893');
INSERT INTO `rnd_history` VALUES ('677', '13', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424061997');
INSERT INTO `rnd_history` VALUES ('678', '14', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062063');
INSERT INTO `rnd_history` VALUES ('679', '15', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062211');
INSERT INTO `rnd_history` VALUES ('680', '16', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062267');
INSERT INTO `rnd_history` VALUES ('681', '17', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062322');
INSERT INTO `rnd_history` VALUES ('682', '18', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062363');
INSERT INTO `rnd_history` VALUES ('683', '19', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":0,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062406');
INSERT INTO `rnd_history` VALUES ('684', '24', 'rnd_setup_text_harvest_compile', '{\"initial_plants\":1,\"first_harvest_days\":1,\"last_harvest_days\":1,\"interval_first_and_last_harvest\":1,\"total_no_of_harvest\":1,\"total_harv_curds\":0,\"total_curd_wt\":0,\"total_market_curds\":0,\"total_market_curd_wt\":0,\"percentage_of_mrkt_curd\":0,\"percentage_of_', 'UI-000037', 'UPDATE', '1424062439');
INSERT INTO `rnd_history` VALUES ('685', '1', 'rnd_data_text_harvest_cropwise', '{\"info\":\"{\\\"normal\\\":{\\\"harvesting_date\\\":\\\"2015-02-02\\\",\\\"initial_plants_during_trial_started\\\":\\\"30\\\",\\\"no_of_plants_harvested\\\":\\\"34\\\",\\\"total_harvested_wt\\\":\\\"56\\\",\\\"total_mrkt_curds\\\":\\\"43\\\",\\\"total_mrkt_curd_wt\\\":\\\"76\\\",\\\"curd_uniformity\\\":\\\"3\\\",\\\"r', 'UI-000037', 'INSERT', '1424172006');
INSERT INTO `rnd_history` VALUES ('686', '2', 'rnd_data_text_harvest_cropwise', '{\"info\":\"{\\\"normal\\\":{\\\"harvesting_date\\\":\\\"2015-02-04\\\",\\\"no_of_plants_harvested\\\":\\\"34\\\",\\\"total_harvested_wt\\\":\\\"98\\\",\\\"total_mrkt_curds\\\":\\\"76\\\",\\\"total_mrkt_curd_wt\\\":\\\"23\\\",\\\"curd_uniformity\\\":\\\"5\\\",\\\"remarks\\\":\\\" Remarks  Remarks  Remarks \\\"},\\\"rep', 'UI-000037', 'INSERT', '1424255343');
INSERT INTO `rnd_history` VALUES ('687', '2', 'rnd_data_text_harvest_cropwise', '{\"info\":\"{\\\"normal\\\":{\\\"harvesting_date\\\":\\\"2015-02-04\\\",\\\"no_of_plants_harvested\\\":\\\"34\\\",\\\"total_harvested_wt\\\":\\\"98\\\",\\\"total_mrkt_curds\\\":\\\"76\\\",\\\"total_mrkt_curd_wt\\\":\\\"23\\\",\\\"curd_uniformity\\\":\\\"5\\\",\\\"remarks\\\":\\\" Remarks  Remarks  Remarks \\\"},\\\"rep', 'UI-000037', 'UPDATE', '1424255364');
INSERT INTO `rnd_history` VALUES ('688', '3', 'rnd_data_text_harvest_cropwise', '{\"info\":\"{\\\"normal\\\":{\\\"harvesting_date\\\":\\\"2015-02-20\\\",\\\"no_of_plants_harvested\\\":\\\"78\\\",\\\"total_harvested_wt\\\":\\\"34\\\",\\\"total_mrkt_curds\\\":\\\"565\\\",\\\"total_mrkt_curd_wt\\\":\\\"6565\\\",\\\"curd_uniformity\\\":\\\"4\\\",\\\"remarks\\\":\\\" Remarks  Remarks \\\"},\\\"replica\\\"', 'UI-000037', 'INSERT', '1424255459');
INSERT INTO `rnd_history` VALUES ('689', '1', 'rnd_data_text_harvest_cropwise', '{\"info\":\"{\\\"normal\\\":{\\\"harvesting_date\\\":\\\"2015-01-02\\\",\\\"no_of_plants_harvested\\\":\\\"34\\\",\\\"total_harvested_wt\\\":\\\"56\\\",\\\"total_mrkt_curds\\\":\\\"43\\\",\\\"total_mrkt_curd_wt\\\":\\\"76\\\",\\\"curd_uniformity\\\":\\\"3\\\",\\\"remarks\\\":\\\" Remarks \\\"},\\\"replica\\\":{\\\"harvesti', 'UI-000037', 'UPDATE', '1424324039');
INSERT INTO `rnd_history` VALUES ('690', '2', 'rnd_data_text_harvest_cropwise', '{\"info\":\"{\\\"normal\\\":{\\\"harvesting_date\\\":\\\"2015-02-04\\\",\\\"no_of_plants_harvested\\\":\\\"34\\\",\\\"total_harvested_wt\\\":\\\"98\\\",\\\"total_mrkt_curds\\\":\\\"76\\\",\\\"total_mrkt_curd_wt\\\":\\\"23\\\",\\\"curd_uniformity\\\":\\\"5\\\",\\\"remarks\\\":\\\" Remarks  Remarks  Remarks \\\"},\\\"rep', 'UI-000037', 'UPDATE', '1424324050');
INSERT INTO `rnd_history` VALUES ('691', '1', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":1,\"first_head_formation\":0,\"first_flow\":0,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":1,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":0,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424342513');
INSERT INTO `rnd_history` VALUES ('692', '2', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":1,\"first_flow\":0,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":1,\"fifty_percent_flow\":0,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424342802');
INSERT INTO `rnd_history` VALUES ('693', '3', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":1,\"first_flow\":0,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":1,\"fifty_percent_flow\":0,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424342982');
INSERT INTO `rnd_history` VALUES ('694', '2', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":1,\"first_flow\":0,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":1,\"fifty_percent_flow\":0,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424342998');
INSERT INTO `rnd_history` VALUES ('695', '4', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424343413');
INSERT INTO `rnd_history` VALUES ('696', '5', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424343560');
INSERT INTO `rnd_history` VALUES ('697', '6', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424343724');
INSERT INTO `rnd_history` VALUES ('698', '7', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424343873');
INSERT INTO `rnd_history` VALUES ('699', '8', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344038');
INSERT INTO `rnd_history` VALUES ('700', '9', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344227');
INSERT INTO `rnd_history` VALUES ('701', '10', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344470');
INSERT INTO `rnd_history` VALUES ('702', '11', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344558');
INSERT INTO `rnd_history` VALUES ('703', '12', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344638');
INSERT INTO `rnd_history` VALUES ('704', '13', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344796');
INSERT INTO `rnd_history` VALUES ('705', '14', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344863');
INSERT INTO `rnd_history` VALUES ('706', '15', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":0,\"first_root\":1,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":0,\"fifty_percent_root\":1,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424344992');
INSERT INTO `rnd_history` VALUES ('707', '16', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":0,\"first_root\":1,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":0,\"fifty_percent_root\":1,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424345059');
INSERT INTO `rnd_history` VALUES ('708', '17', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424345148');
INSERT INTO `rnd_history` VALUES ('709', '18', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":1,\"first_root\":0,\"first_cutting\":0,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":1,\"fifty_percent_root\":0,\"last_cutting\":0,\"first_harvest\":1,\"no_of_cu', 'UI-000037', 'UPDATE', '1424345228');
INSERT INTO `rnd_history` VALUES ('710', '19', 'rnd_setup_text_veg_fruit', '{\"first_curd_formation\":0,\"first_head_formation\":0,\"first_flow\":0,\"first_root\":0,\"first_cutting\":1,\"fifty_percent_curd_formation\":0,\"fifty_percent_head_formation\":0,\"fifty_percent_flow\":0,\"fifty_percent_root\":0,\"last_cutting\":1,\"first_harvest\":0,\"no_of_cu', 'UI-000037', 'UPDATE', '1424345304');
INSERT INTO `rnd_history` VALUES ('711', '1', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":1,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424345769');
INSERT INTO `rnd_history` VALUES ('712', '20', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":1,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424345878');
INSERT INTO `rnd_history` VALUES ('713', '2', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":1,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424345940');
INSERT INTO `rnd_history` VALUES ('714', '21', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":1,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424345980');
INSERT INTO `rnd_history` VALUES ('715', '3', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":1,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346002');
INSERT INTO `rnd_history` VALUES ('716', '22', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":1,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346087');
INSERT INTO `rnd_history` VALUES ('717', '4', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346226');
INSERT INTO `rnd_history` VALUES ('718', '6', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346307');
INSERT INTO `rnd_history` VALUES ('719', '7', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346346');
INSERT INTO `rnd_history` VALUES ('720', '8', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346370');
INSERT INTO `rnd_history` VALUES ('721', '9', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346398');
INSERT INTO `rnd_history` VALUES ('722', '10', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346559');
INSERT INTO `rnd_history` VALUES ('723', '11', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346583');
INSERT INTO `rnd_history` VALUES ('724', '12', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346602');
INSERT INTO `rnd_history` VALUES ('725', '13', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346617');
INSERT INTO `rnd_history` VALUES ('726', '14', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346642');
INSERT INTO `rnd_history` VALUES ('727', '15', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":1,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346667');
INSERT INTO `rnd_history` VALUES ('728', '16', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":1,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346693');
INSERT INTO `rnd_history` VALUES ('729', '17', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346712');
INSERT INTO `rnd_history` VALUES ('730', '18', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":1,\"avg_root_wt\":0,\"avg_leaf_wt\":0,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346741');
INSERT INTO `rnd_history` VALUES ('731', '19', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":1,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346773');
INSERT INTO `rnd_history` VALUES ('732', '24', 'rnd_setup_text_yield', '{\"initial_plants\":1,\"no_of_plants_survived\":1,\"survival_percentage\":1,\"total_plant_per_ha\":1,\"avg_curd_wt\":0,\"avg_head_wt\":0,\"avg_fruit_wt\":0,\"avg_root_wt\":0,\"avg_leaf_wt\":1,\"max_estimated_yield_per_ha\":1,\"max_estimated_yield_evaluation\":1,\"actual_yield_p', 'UI-000037', 'UPDATE', '1424346796');
INSERT INTO `rnd_history` VALUES ('733', '1', 'rnd_data_text_harvest_compile', '{\"info\":\"{\\\"normal\\\":{\\\"f_holding_capacity\\\":\\\"34\\\",\\\"evaluation\\\":\\\"5\\\",\\\"accepted\\\":\\\"1\\\",\\\"remarks\\\":\\\" Remarks \\\"},\\\"replica\\\":{\\\"f_holding_capacity\\\":\\\"\\\",\\\"evaluation\\\":\\\"\\\",\\\"accepted\\\":\\\"\\\",\\\"remarks\\\":\\\"\\\"}}\",\"variety_id\":\"1\",\"year\":\"2014\",\"seaso', 'UI-000037', 'INSERT', '1424356950');
INSERT INTO `rnd_history` VALUES ('734', '1', 'rnd_data_text_yield', '{\"info\":\"{\\\"normal\\\":{\\\"no_of_plants_survived\\\":\\\"16\\\",\\\"survival_percentage\\\":\\\"53.33\\\",\\\"total_plant_per_ha\\\":\\\"1231\\\",\\\"max_estimated_yield_per_ha\\\":\\\"1.231\\\",\\\"max_estimated_yield_evaluation\\\":\\\"5\\\",\\\"actual_yield_per_ha\\\":\\\"53\\\",\\\"actual_yield_per_ha', 'UI-000037', 'INSERT', '1424462230');

-- ----------------------------
-- Table structure for `rnd_principal`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_principal`;
CREATE TABLE `rnd_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `principal_name` varchar(255) NOT NULL,
  `principal_code` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(20) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_principal
-- ----------------------------
INSERT INTO `rnd_principal` VALUES ('1', ' Principal 001', '001', 'Mr. Saiful', '', '', '', '1', 'UI-000037', '1422524559', null, null);
INSERT INTO `rnd_principal` VALUES ('2', ' Principal 002', '102', '', '', '', '', '1', 'UI-000037', '1422524632', null, null);
INSERT INTO `rnd_principal` VALUES ('3', ' Principal 003', '103', 'Mr. Yasir', '', '', '', '1', 'UI-000037', '1422524677', null, null);
INSERT INTO `rnd_principal` VALUES ('4', ' Principal 004', '204', '', '', '', '', '1', 'UI-000037', '1422524704', null, null);
INSERT INTO `rnd_principal` VALUES ('5', ' Principal 005', '205', '', '', '', '', '1', 'UI-000037', '1422524724', null, null);
INSERT INTO `rnd_principal` VALUES ('6', ' Principal 006', '306', '', '', '', '', '1', 'UI-000037', '1422524773', null, null);
INSERT INTO `rnd_principal` VALUES ('7', ' Principal 007', '107', '', '', '', '', '1', 'UI-000037', '1422524796', null, null);
INSERT INTO `rnd_principal` VALUES ('8', ' Principal 008', '308', '', '', '', '', '1', 'UI-000037', '1422524820', null, null);

-- ----------------------------
-- Table structure for `rnd_season`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_season`;
CREATE TABLE `rnd_season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_season
-- ----------------------------
INSERT INTO `rnd_season` VALUES ('1', 'Summer');
INSERT INTO `rnd_season` VALUES ('2', 'Rainy Summer');
INSERT INTO `rnd_season` VALUES ('3', 'Early Winter');
INSERT INTO `rnd_season` VALUES ('4', 'Optimum Winter');
INSERT INTO `rnd_season` VALUES ('5', 'Late Winter');

-- ----------------------------
-- Table structure for `rnd_setup_image_fifteen_days`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_image_fifteen_days`;
CREATE TABLE `rnd_setup_image_fifteen_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `number_of_fifteendays` int(11) NOT NULL DEFAULT '3',
  `images` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_image_fifteen_days
-- ----------------------------
INSERT INTO `rnd_setup_image_fifteen_days` VALUES ('1', '2014', '1', '1', '2', '4', '{\"15\":\"1440_900_20110926042759454625.jpg\",\"30\":\"CF_6.jpg\",\"45\":\"CF_CK_2.jpg\",\"60\":\"CF_CK_3.jpg\"}', 'UI-000037', '1423371083', null, null);
INSERT INTO `rnd_setup_image_fifteen_days` VALUES ('2', '2014', '1', '4', '10', '3', '{\"15\":\"CF_4.jpg\",\"30\":\"CF_5.jpg\",\"45\":\"1440_900_201109260427594546251.jpg\"}', 'UI-000037', '1423372951', null, null);

-- ----------------------------
-- Table structure for `rnd_setup_image_flowering`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_image_flowering`;
CREATE TABLE `rnd_setup_image_flowering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `images` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_image_flowering
-- ----------------------------
INSERT INTO `rnd_setup_image_flowering` VALUES ('1', '2014', '1', '1', '2', '{\"1\":\"CF_1.jpg\",\"2\":\"CF_CK_3.jpg\",\"3\":\"CF_4.jpg\",\"4\":\"CF_8.jpg\",\"5\":\"1440_900_20110926042759454625.jpg\",\"6\":\"CF_CK_8.jpg\"}', 'UI-000037', '1423377424', null, null);

-- ----------------------------
-- Table structure for `rnd_setup_image_fruit`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_image_fruit`;
CREATE TABLE `rnd_setup_image_fruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `images` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_image_fruit
-- ----------------------------
INSERT INTO `rnd_setup_image_fruit` VALUES ('1', '2014', '1', '1', '1', '{\"1\":\"no_image.jpg\",\"2\":\"no_image.jpg\",\"3\":\"Desert.jpg\",\"4\":\"no_image.jpg\"}', 'UI-000037', '1423435803', null, null);

-- ----------------------------
-- Table structure for `rnd_setup_image_harvest_cropwise`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_image_harvest_cropwise`;
CREATE TABLE `rnd_setup_image_harvest_cropwise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `season_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `images` text,
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_image_harvest_cropwise
-- ----------------------------
INSERT INTO `rnd_setup_image_harvest_cropwise` VALUES ('1', '2014', '1', '1', '2', '{\"1\":\"CF_5.jpg\",\"2\":\"CF_CK_3.jpg\"}', 'UI-000037', '1423399324', 'UI-000037', '1423470360');

-- ----------------------------
-- Table structure for `rnd_setup_text_fifteen_days`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_fifteen_days`;
CREATE TABLE `rnd_setup_text_fifteen_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `sowing_date` tinyint(4) NOT NULL DEFAULT '0',
  `transplanting_date` tinyint(4) NOT NULL DEFAULT '0',
  `fortnightly_reporting_date` tinyint(4) NOT NULL DEFAULT '0',
  `initial_plants_during_trial_started` tinyint(4) NOT NULL DEFAULT '0',
  `plant_type_appearance` tinyint(4) NOT NULL DEFAULT '0',
  `plant_type` tinyint(4) NOT NULL DEFAULT '0',
  `plant_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `distance_from_ground_to_curd` tinyint(4) NOT NULL DEFAULT '0',
  `distance_from_ground_to_head` tinyint(4) NOT NULL DEFAULT '0',
  `distance_from_ground_to_root_shoulder` tinyint(4) NOT NULL DEFAULT '0',
  `distance_from_ground_leaf_shoulder` tinyint(4) NOT NULL DEFAULT '0',
  `curd_type` tinyint(4) NOT NULL DEFAULT '0',
  `head_type` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_shape` tinyint(4) NOT NULL DEFAULT '0',
  `root_shape` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_shape` tinyint(4) NOT NULL DEFAULT '0',
  `root_type` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_type` tinyint(4) NOT NULL DEFAULT '0',
  `spine_type` tinyint(4) NOT NULL DEFAULT '0',
  `curd_colour` tinyint(4) NOT NULL DEFAULT '0',
  `head_colour` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_colour` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_colour` tinyint(4) NOT NULL DEFAULT '0',
  `root_colour` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_size` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_bearing` tinyint(4) NOT NULL DEFAULT '0',
  `curd_compactness` tinyint(4) NOT NULL DEFAULT '0',
  `head_compactness` tinyint(4) NOT NULL DEFAULT '0',
  `curd_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `head_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_size_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `uniformity_of_leaves` tinyint(4) NOT NULL DEFAULT '0',
  `disease_sustainability` tinyint(4) NOT NULL DEFAULT '0',
  `internode_distance` tinyint(4) NOT NULL DEFAULT '0',
  `hardness_of_spines` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_height_from_root` tinyint(4) NOT NULL DEFAULT '0',
  `adaptability` tinyint(4) NOT NULL DEFAULT '0',
  `ridge_quality` tinyint(4) NOT NULL DEFAULT '0',
  `special_characters` tinyint(4) NOT NULL DEFAULT '0',
  `accepted` tinyint(4) NOT NULL DEFAULT '0',
  `remarks` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_fifteen_days
-- ----------------------------
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422438965', 'UI-000037', '1422878954');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('2', '2', '1', '1', '1', '1', '1', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422519707', 'UI-000037', '1422856997');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('3', '3', '1', '1', '1', '1', '1', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422519814', 'UI-000037', '1422857199');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('4', '4', '1', '1', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1422857269');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('5', '5', '1', '1', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422520142', 'UI-000037', '1422857342');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('6', '6', '1', '1', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1422857494');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('7', '7', '1', '0', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1422858250');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('8', '8', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '1', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1422858342');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('9', '9', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1422858418');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('10', '10', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1422858498');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('11', '11', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1422858578');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('12', '12', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1422858689');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('13', '13', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1422858835');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('14', '14', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1422858894');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('15', '15', '1', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '1', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422521677', 'UI-000037', '1422859002');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('16', '16', '1', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '1', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422521876', 'UI-000037', '1422859102');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('17', '17', '1', '0', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1422859176');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('18', '18', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1422859251');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('19', '19', '1', '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1422859653');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('20', '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284645', 'UI-000037', '1423529725');
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('21', '21', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284759', null, null);
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('22', '22', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284842', null, null);
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('23', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284986', null, null);
INSERT INTO `rnd_setup_text_fifteen_days` VALUES ('24', '24', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423285115', null, null);

-- ----------------------------
-- Table structure for `rnd_setup_text_flowering`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_flowering`;
CREATE TABLE `rnd_setup_text_flowering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `1st_curd_formation` tinyint(4) NOT NULL DEFAULT '0',
  `1st_root_formation` tinyint(4) NOT NULL DEFAULT '0',
  `1st_head_formation` tinyint(4) NOT NULL DEFAULT '0',
  `1st_flowering_days` tinyint(4) NOT NULL DEFAULT '0',
  `50_percent_flowering_days` tinyint(4) NOT NULL DEFAULT '0',
  `full_flowering_days` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_1st_curd_formation_plants` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_1st_root_formation_plants` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_1st_head_formation_plants` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_1st_flowering_plants` tinyint(4) NOT NULL DEFAULT '0',
  `1st_flowering_to_full_flowering` tinyint(4) NOT NULL DEFAULT '0',
  `50_percent_curd_formation_days` tinyint(4) NOT NULL DEFAULT '0',
  `50_percent_head_formation_days` tinyint(4) NOT NULL DEFAULT '0',
  `50_percent_root_formation_days` tinyint(4) NOT NULL DEFAULT '0',
  `1st_curd_formation_to_marketable_curd_formation` tinyint(4) NOT NULL DEFAULT '0',
  `1st_head_formation_to_marketable_head_formation` tinyint(4) NOT NULL DEFAULT '0',
  `1st_root_formation_to_marketable_root_formation` tinyint(4) NOT NULL DEFAULT '0',
  `1st_flowering_to_first_fruit_setting` tinyint(4) NOT NULL DEFAULT '0',
  `1st_curd_formation_to_1st_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `1st_head_formation_to_1st_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `1st_root_formation_to_1st_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `1st_fruit_setting_to_1st_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `number_of_female_flower` tinyint(4) NOT NULL DEFAULT '0',
  `special_characters` tinyint(4) NOT NULL DEFAULT '0',
  `evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `accepted` tinyint(4) NOT NULL DEFAULT '0',
  `remarks` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_flowering
-- ----------------------------
INSERT INTO `rnd_setup_text_flowering` VALUES ('1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422438965', 'UI-000037', '1423374800');
INSERT INTO `rnd_setup_text_flowering` VALUES ('2', '2', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422519707', 'UI-000037', '1423306936');
INSERT INTO `rnd_setup_text_flowering` VALUES ('3', '3', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422519814', 'UI-000037', '1423292432');
INSERT INTO `rnd_setup_text_flowering` VALUES ('4', '4', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1423292513');
INSERT INTO `rnd_setup_text_flowering` VALUES ('5', '5', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422520142', 'UI-000037', '1423292572');
INSERT INTO `rnd_setup_text_flowering` VALUES ('6', '6', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1423292762');
INSERT INTO `rnd_setup_text_flowering` VALUES ('7', '7', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1423293073');
INSERT INTO `rnd_setup_text_flowering` VALUES ('8', '8', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1423293127');
INSERT INTO `rnd_setup_text_flowering` VALUES ('9', '9', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1423293231');
INSERT INTO `rnd_setup_text_flowering` VALUES ('10', '10', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1423293265');
INSERT INTO `rnd_setup_text_flowering` VALUES ('11', '11', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1423293296');
INSERT INTO `rnd_setup_text_flowering` VALUES ('12', '12', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1423293332');
INSERT INTO `rnd_setup_text_flowering` VALUES ('13', '13', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1423293361');
INSERT INTO `rnd_setup_text_flowering` VALUES ('14', '14', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1423293389');
INSERT INTO `rnd_setup_text_flowering` VALUES ('15', '15', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422521677', 'UI-000037', '1423293465');
INSERT INTO `rnd_setup_text_flowering` VALUES ('16', '16', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422521876', 'UI-000037', '1423293531');
INSERT INTO `rnd_setup_text_flowering` VALUES ('17', '17', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1423293579');
INSERT INTO `rnd_setup_text_flowering` VALUES ('18', '18', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1423293649');
INSERT INTO `rnd_setup_text_flowering` VALUES ('19', '19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423293670');
INSERT INTO `rnd_setup_text_flowering` VALUES ('20', '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423293670');
INSERT INTO `rnd_setup_text_flowering` VALUES ('21', '21', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423293670');
INSERT INTO `rnd_setup_text_flowering` VALUES ('22', '22', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423293670');
INSERT INTO `rnd_setup_text_flowering` VALUES ('23', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423293670');
INSERT INTO `rnd_setup_text_flowering` VALUES ('24', '24', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423293670');

-- ----------------------------
-- Table structure for `rnd_setup_text_fruit`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_fruit`;
CREATE TABLE `rnd_setup_text_fruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `fruit_size` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_size_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_shape` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_shape_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_colour` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_colour_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_weight` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_weight_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_diameter` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_diameter_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_height` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_height_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_firmness` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_taste` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_type` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_type_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_bearing_type` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_bearing_type_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `curd_type` tinyint(4) NOT NULL DEFAULT '0',
  `curd_type_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `curd_colour` tinyint(4) NOT NULL DEFAULT '0',
  `curd_colour_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `curd_weight` tinyint(4) NOT NULL DEFAULT '0',
  `curd_weight_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `curd_diameter` tinyint(4) NOT NULL DEFAULT '0',
  `curd_diameter_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `curd_height` tinyint(4) NOT NULL DEFAULT '0',
  `curd_height_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `curd_compactness` tinyint(4) NOT NULL DEFAULT '0',
  `head_type` tinyint(4) NOT NULL DEFAULT '0',
  `head_type_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `head_colour` tinyint(4) NOT NULL DEFAULT '0',
  `head_colour_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `head_weight` tinyint(4) NOT NULL DEFAULT '0',
  `head_weight_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `head_diameter` tinyint(4) NOT NULL DEFAULT '0',
  `head_diameter_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `head_height` tinyint(4) NOT NULL,
  `head_height_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `targeted_weight` tinyint(4) NOT NULL DEFAULT '0',
  `targeted_height` tinyint(4) NOT NULL DEFAULT '0',
  `head_compactness` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_length` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_length_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_type` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_type_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_colour` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_colour_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `root_above_ground` tinyint(4) NOT NULL DEFAULT '0',
  `root_above_ground_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `root_colour` tinyint(4) NOT NULL DEFAULT '0',
  `root_colour_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `root_weight` tinyint(4) NOT NULL DEFAULT '0',
  `root_weight_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `root_diameter` tinyint(4) NOT NULL DEFAULT '0',
  `root_diameter_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `root_height` tinyint(4) NOT NULL DEFAULT '0',
  `root_height_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `root_taste` tinyint(4) NOT NULL DEFAULT '0',
  `root_shape` tinyint(4) NOT NULL DEFAULT '0',
  `root_shape_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `targeted_root_height` tinyint(4) NOT NULL DEFAULT '0',
  `taste` tinyint(4) NOT NULL DEFAULT '0',
  `keeping_quality` tinyint(4) NOT NULL DEFAULT '0',
  `pungency` tinyint(4) NOT NULL DEFAULT '0',
  `seed_maturity_during_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `seed_density` tinyint(4) NOT NULL DEFAULT '0',
  `spine_type` tinyint(4) NOT NULL DEFAULT '0',
  `spine_type_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `hardness_of_spines` tinyint(4) NOT NULL DEFAULT '0',
  `core_diameter` tinyint(4) NOT NULL DEFAULT '0',
  `core_diameter_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `flesh_colour` tinyint(4) NOT NULL DEFAULT '0',
  `flesh_colour_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `smoothness_of_skin` tinyint(4) NOT NULL DEFAULT '0',
  `ridge_type` tinyint(4) NOT NULL DEFAULT '0',
  `ridge_strength` tinyint(4) NOT NULL DEFAULT '0',
  `waxiness_of_skin` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_edges_in_fruit` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_edges_in_fruit_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `tenderness_of_fruit` tinyint(4) NOT NULL DEFAULT '0',
  `plant_height` tinyint(4) NOT NULL DEFAULT '0',
  `plant_height_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `brix_percent` tinyint(4) NOT NULL DEFAULT '0',
  `flavor` tinyint(4) NOT NULL DEFAULT '0',
  `seed_percentage` tinyint(4) NOT NULL DEFAULT '0',
  `seed_percentage_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `special_characters` tinyint(4) NOT NULL DEFAULT '0',
  `accepted` tinyint(4) NOT NULL DEFAULT '0',
  `remarks` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_fruit
-- ----------------------------
INSERT INTO `rnd_setup_text_fruit` VALUES ('1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422438965', 'UI-000037', '1423474285');
INSERT INTO `rnd_setup_text_fruit` VALUES ('2', '2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422519707', 'UI-000037', '1423474519');
INSERT INTO `rnd_setup_text_fruit` VALUES ('3', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422519814', 'UI-000037', '1423475455');
INSERT INTO `rnd_setup_text_fruit` VALUES ('4', '4', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1423475518');
INSERT INTO `rnd_setup_text_fruit` VALUES ('5', '5', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520142', 'UI-000037', '1423475675');
INSERT INTO `rnd_setup_text_fruit` VALUES ('6', '6', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1423476080');
INSERT INTO `rnd_setup_text_fruit` VALUES ('7', '7', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1423476337');
INSERT INTO `rnd_setup_text_fruit` VALUES ('8', '8', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1423476382');
INSERT INTO `rnd_setup_text_fruit` VALUES ('9', '9', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1423476422');
INSERT INTO `rnd_setup_text_fruit` VALUES ('10', '10', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1423476494');
INSERT INTO `rnd_setup_text_fruit` VALUES ('11', '11', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1423476536');
INSERT INTO `rnd_setup_text_fruit` VALUES ('12', '12', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1423476877');
INSERT INTO `rnd_setup_text_fruit` VALUES ('13', '13', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1423476931');
INSERT INTO `rnd_setup_text_fruit` VALUES ('14', '14', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1423476963');
INSERT INTO `rnd_setup_text_fruit` VALUES ('15', '15', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521677', 'UI-000037', '1423477324');
INSERT INTO `rnd_setup_text_fruit` VALUES ('16', '16', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521876', 'UI-000037', '1423477663');
INSERT INTO `rnd_setup_text_fruit` VALUES ('17', '17', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1423478392');
INSERT INTO `rnd_setup_text_fruit` VALUES ('18', '18', '0', '0', '1', '1', '0', '0', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1423478477');
INSERT INTO `rnd_setup_text_fruit` VALUES ('19', '19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423478521');
INSERT INTO `rnd_setup_text_fruit` VALUES ('20', '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423478521');
INSERT INTO `rnd_setup_text_fruit` VALUES ('21', '21', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423478521');
INSERT INTO `rnd_setup_text_fruit` VALUES ('22', '22', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423478521');
INSERT INTO `rnd_setup_text_fruit` VALUES ('23', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423478521');
INSERT INTO `rnd_setup_text_fruit` VALUES ('24', '24', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '1', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423478521');

-- ----------------------------
-- Table structure for `rnd_setup_text_harvest_compile`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_harvest_compile`;
CREATE TABLE `rnd_setup_text_harvest_compile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `initial_plants` tinyint(4) NOT NULL DEFAULT '0',
  `first_harvest_days` tinyint(4) NOT NULL DEFAULT '0',
  `last_harvest_days` tinyint(4) NOT NULL DEFAULT '0',
  `interval_first_and_last_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `total_no_of_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `total_harv_curds` tinyint(4) NOT NULL DEFAULT '0',
  `total_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_curds` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_curd` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_harv_heads` tinyint(4) NOT NULL DEFAULT '0',
  `total_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_heads` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_head` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_harv_fruits` tinyint(4) NOT NULL DEFAULT '0',
  `total_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_fruits` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_fruit` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_fruit_plant` tinyint(4) NOT NULL DEFAULT '0',
  `avg_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `fr_wt_plant` tinyint(4) NOT NULL DEFAULT '0',
  `total_harv_roots` tinyint(4) NOT NULL DEFAULT '0',
  `total_root_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_roots` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_root_wt` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_root` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_root_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_root_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_leaf_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_market_leaf_wt` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_leaf` tinyint(4) NOT NULL DEFAULT '0',
  `percentage_of_mrkt_leaf_wt` tinyint(4) NOT NULL DEFAULT '0',
  `f_holding_capacity` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_harvest_compile
-- ----------------------------
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422438965', 'UI-000037', '1424005485');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('2', '2', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422519707', 'UI-000037', '1424005968');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('3', '3', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422519814', 'UI-000037', '1424006172');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('4', '4', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1424061466');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('5', '5', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520142', 'UI-000037', '1424061522');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('6', '6', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1424061562');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('7', '7', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1424061600');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('8', '8', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1424061638');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('9', '9', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1424061690');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('10', '10', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1424061755');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('11', '11', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1424061836');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('12', '12', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1424061893');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('13', '13', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1424061997');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('14', '14', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1424062063');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('15', '15', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521677', 'UI-000037', '1424062211');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('16', '16', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521876', 'UI-000037', '1424062267');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('17', '17', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1424062322');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('18', '18', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1424062363');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('19', '19', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1424062406');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('20', '20', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1423284645', 'UI-000037', '1424005611');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('21', '21', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1423284759', 'UI-000037', '1424006135');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('22', '22', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', 'UI-000037', '1423284842', 'UI-000037', '1424006287');
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('23', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284986', null, null);
INSERT INTO `rnd_setup_text_harvest_compile` VALUES ('24', '24', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1423285115', 'UI-000037', '1424062438');

-- ----------------------------
-- Table structure for `rnd_setup_text_harvest_cropwise`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_harvest_cropwise`;
CREATE TABLE `rnd_setup_text_harvest_cropwise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `harvesting_date` tinyint(4) NOT NULL DEFAULT '0',
  `initial_plants_during_trial_started` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_plants_harvested` tinyint(4) NOT NULL DEFAULT '0',
  `total_harvested_wt` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_curds` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `curd_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_heads` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `head_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_fruits` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_fruits` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_roots_harvested` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_roots` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_roots_wt` tinyint(4) NOT NULL DEFAULT '0',
  `roots_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_leaf` tinyint(4) NOT NULL DEFAULT '0',
  `total_mrkt_leaf_wt` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_uniformity` tinyint(4) NOT NULL DEFAULT '0',
  `remarks` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_harvest_cropwise
-- ----------------------------
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422438965', 'UI-000037', '1423483455');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('2', '2', '1', '1', '1', '1', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422519707', 'UI-000037', '1423483529');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('3', '3', '1', '1', '1', '1', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422519814', 'UI-000037', '1423483776');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('4', '4', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1423484523');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('5', '5', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520142', 'UI-000037', '1423484621');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('6', '6', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1423484643');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('7', '7', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1423484659');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('8', '8', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1423484681');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('9', '9', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1423484861');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('10', '10', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1423484888');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('11', '11', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1423484917');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('12', '12', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1423484955');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('13', '13', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1423484971');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('14', '14', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1423484996');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('15', '15', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '1', '1', 'UI-000037', '1422521677', 'UI-000037', '1423485195');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('16', '16', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '1', '1', 'UI-000037', '1422521876', 'UI-000037', '1423485234');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('17', '17', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1423485346');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('18', '18', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1423485376');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('19', '19', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423485428');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('20', '20', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423485428');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('21', '21', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423485428');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('22', '22', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423485428');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('23', '23', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423485428');
INSERT INTO `rnd_setup_text_harvest_cropwise` VALUES ('24', '24', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1423485428');

-- ----------------------------
-- Table structure for `rnd_setup_text_veg_fruit`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_veg_fruit`;
CREATE TABLE `rnd_setup_text_veg_fruit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `first_curd_formation` tinyint(4) NOT NULL DEFAULT '0',
  `first_head_formation` tinyint(4) NOT NULL DEFAULT '0',
  `first_flow` tinyint(4) NOT NULL DEFAULT '0',
  `first_root` tinyint(4) NOT NULL DEFAULT '0',
  `first_cutting` tinyint(4) NOT NULL DEFAULT '0',
  `fifty_percent_curd_formation` tinyint(4) NOT NULL DEFAULT '0',
  `fifty_percent_head_formation` tinyint(4) NOT NULL DEFAULT '0',
  `fifty_percent_flow` tinyint(4) NOT NULL DEFAULT '0',
  `fifty_percent_root` tinyint(4) NOT NULL DEFAULT '0',
  `last_cutting` tinyint(4) NOT NULL DEFAULT '0',
  `first_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_cutting` tinyint(4) NOT NULL DEFAULT '0',
  `last_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_harvest` tinyint(4) NOT NULL DEFAULT '0',
  `curd_colour` tinyint(4) NOT NULL DEFAULT '0',
  `head_colour` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_colour` tinyint(4) NOT NULL DEFAULT '0',
  `root_colour` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_colour` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_length` tinyint(4) NOT NULL DEFAULT '0',
  `leaf_type` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_size` tinyint(4) NOT NULL DEFAULT '0',
  `root_size` tinyint(4) NOT NULL DEFAULT '0',
  `curd_shape` tinyint(4) NOT NULL DEFAULT '0',
  `head_shape` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_shape` tinyint(4) NOT NULL DEFAULT '0',
  `root_shape` tinyint(4) NOT NULL DEFAULT '0',
  `curd_diam` tinyint(4) NOT NULL DEFAULT '0',
  `head_diam` tinyint(4) NOT NULL DEFAULT '0',
  `avg_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_leaf_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `plant_height` tinyint(4) NOT NULL DEFAULT '0',
  `harvest_unif` tinyint(4) NOT NULL DEFAULT '0',
  `cluster_per_plant` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_per_cluster` tinyint(4) NOT NULL DEFAULT '0',
  `fruit_pungency` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_plants_per_plot` tinyint(4) NOT NULL DEFAULT '0',
  `avg_fruit_wt_per_plant` tinyint(4) NOT NULL DEFAULT '0',
  `average_harvested_plant` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_veg_fruit
-- ----------------------------
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', 'UI-000037', '1422438965', 'UI-000037', '1424342513');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('2', '2', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', 'UI-000037', '1422519707', 'UI-000037', '1424342998');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('3', '3', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', 'UI-000037', '1422519814', 'UI-000037', '1424342982');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('4', '4', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1424343413');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('5', '5', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '1', '1', '1', '1', '1', 'UI-000037', '1422520142', 'UI-000037', '1424343560');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('6', '6', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1424343724');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('7', '7', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1424343873');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('8', '8', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1424344038');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('9', '9', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1424344227');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('10', '10', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1424344470');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('11', '11', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1424344558');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('12', '12', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1424344638');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('13', '13', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1424344796');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('14', '14', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1424344863');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('15', '15', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '1', 'UI-000037', '1422521677', 'UI-000037', '1424344992');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('16', '16', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '0', '1', '1', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '1', 'UI-000037', '1422521876', 'UI-000037', '1424345059');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('17', '17', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1424345148');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('18', '18', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '1', '0', '1', '1', '0', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1424345228');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('19', '19', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '1', 'UI-000037', '1422522345', 'UI-000037', '1424345304');
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('20', '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284645', null, null);
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('21', '21', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284759', null, null);
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('22', '22', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284842', null, null);
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('23', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284986', null, null);
INSERT INTO `rnd_setup_text_veg_fruit` VALUES ('24', '24', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423285115', null, null);

-- ----------------------------
-- Table structure for `rnd_setup_text_yield`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_setup_text_yield`;
CREATE TABLE `rnd_setup_text_yield` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `initial_plants` tinyint(4) NOT NULL DEFAULT '0',
  `no_of_plants_survived` tinyint(4) NOT NULL DEFAULT '0',
  `survival_percentage` tinyint(4) NOT NULL DEFAULT '0',
  `total_plant_per_ha` tinyint(4) NOT NULL DEFAULT '0',
  `avg_curd_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_head_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_fruit_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_root_wt` tinyint(4) NOT NULL DEFAULT '0',
  `avg_leaf_wt` tinyint(4) NOT NULL DEFAULT '0',
  `max_estimated_yield_per_ha` tinyint(4) NOT NULL DEFAULT '0',
  `max_estimated_yield_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `actual_yield_per_ha` tinyint(4) NOT NULL DEFAULT '0',
  `actual_yield_per_ha_evaluation` tinyint(4) NOT NULL DEFAULT '0',
  `targeted_yield_per_ha` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_setup_text_yield
-- ----------------------------
INSERT INTO `rnd_setup_text_yield` VALUES ('1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422438965', 'UI-000037', '1424345769');
INSERT INTO `rnd_setup_text_yield` VALUES ('2', '2', '1', '1', '1', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422519707', 'UI-000037', '1424345940');
INSERT INTO `rnd_setup_text_yield` VALUES ('3', '3', '1', '1', '1', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422519814', 'UI-000037', '1424346002');
INSERT INTO `rnd_setup_text_yield` VALUES ('4', '4', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422519944', 'UI-000037', '1424346226');
INSERT INTO `rnd_setup_text_yield` VALUES ('5', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1422520142', null, null);
INSERT INTO `rnd_setup_text_yield` VALUES ('6', '6', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520372', 'UI-000037', '1424346307');
INSERT INTO `rnd_setup_text_yield` VALUES ('7', '7', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520575', 'UI-000037', '1424346346');
INSERT INTO `rnd_setup_text_yield` VALUES ('8', '8', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520894', 'UI-000037', '1424346370');
INSERT INTO `rnd_setup_text_yield` VALUES ('9', '9', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422520986', 'UI-000037', '1424346398');
INSERT INTO `rnd_setup_text_yield` VALUES ('10', '10', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521115', 'UI-000037', '1424346559');
INSERT INTO `rnd_setup_text_yield` VALUES ('11', '11', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521223', 'UI-000037', '1424346583');
INSERT INTO `rnd_setup_text_yield` VALUES ('12', '12', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521322', 'UI-000037', '1424346602');
INSERT INTO `rnd_setup_text_yield` VALUES ('13', '13', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521406', 'UI-000037', '1424346617');
INSERT INTO `rnd_setup_text_yield` VALUES ('14', '14', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521505', 'UI-000037', '1424346642');
INSERT INTO `rnd_setup_text_yield` VALUES ('15', '15', '1', '1', '1', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521677', 'UI-000037', '1424346667');
INSERT INTO `rnd_setup_text_yield` VALUES ('16', '16', '1', '1', '1', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422521876', 'UI-000037', '1424346693');
INSERT INTO `rnd_setup_text_yield` VALUES ('17', '17', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422522060', 'UI-000037', '1424346712');
INSERT INTO `rnd_setup_text_yield` VALUES ('18', '18', '1', '1', '1', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422522202', 'UI-000037', '1424346741');
INSERT INTO `rnd_setup_text_yield` VALUES ('19', '19', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422522345', 'UI-000037', '1424346773');
INSERT INTO `rnd_setup_text_yield` VALUES ('20', '20', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1423284645', 'UI-000037', '1424345878');
INSERT INTO `rnd_setup_text_yield` VALUES ('21', '21', '1', '1', '1', '1', '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1423284759', 'UI-000037', '1424345980');
INSERT INTO `rnd_setup_text_yield` VALUES ('22', '22', '1', '1', '1', '1', '0', '0', '0', '1', '0', '1', '1', '1', '1', '1', '1', 'UI-000037', '1423284842', 'UI-000037', '1424346087');
INSERT INTO `rnd_setup_text_yield` VALUES ('23', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UI-000037', '1423284986', null, null);
INSERT INTO `rnd_setup_text_yield` VALUES ('24', '24', '1', '1', '1', '1', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '1', 'UI-000037', '1423285115', 'UI-000037', '1424346796');

-- ----------------------------
-- Table structure for `rnd_variety`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_variety`;
CREATE TABLE `rnd_variety` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variety_index` tinyint(4) NOT NULL,
  `year` varchar(255) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `crop_type_id` int(11) NOT NULL,
  `variety_name` varchar(255) NOT NULL,
  `variety_type` int(11) NOT NULL,
  `principal_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `number_of_seeds` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `replica_status` tinyint(4) NOT NULL DEFAULT '0',
  `new_status` tinyint(4) DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_variety
-- ----------------------------
INSERT INTO `rnd_variety` VALUES ('1', '1', '2014', '1', '2', 'White Marble', '1', '1', '', '230', '10', 'Rain Tolerant', '0', '1', '1', 'UI-000037', '1422696260', 'UI-000037', '1422696635');
INSERT INTO `rnd_variety` VALUES ('2', '2', '2014', '1', '2', 'White Thunder', '1', '2', '', '250', '20', 'ddd', '0', '1', '1', 'UI-000037', '1422875192', null, null);
INSERT INTO `rnd_variety` VALUES ('3', '1', '2014', '2', '5', 'Atlas-70', '2', '0', '', '222', '25', 'dsfsdf', '0', '1', '1', 'UI-000037', '1422875238', null, null);
INSERT INTO `rnd_variety` VALUES ('4', '2', '2014', '2', '5', '406', '1', '6', '', '200', '30', 'ggg', '0', '1', '1', 'UI-000037', '1422875275', null, null);
INSERT INTO `rnd_variety` VALUES ('5', '1', '2014', '4', '10', 'TH 04', '1', '6', '', '244', '35', 'sdfsdfd', '1', '1', '1', 'UI-000037', '1422875321', null, null);
INSERT INTO `rnd_variety` VALUES ('6', '2', '2014', '4', '10', 'lovely', '3', '0', 'Lal Teer', '222', '35', 'sdfsdf', '1', '1', '1', 'UI-000037', '1422875407', null, null);
INSERT INTO `rnd_variety` VALUES ('7', '1', '2014', '5', '12', 'indu', '1', '8', '', '300', '30', 'dfdgdfhd', '1', '1', '1', 'UI-000037', '1422875464', null, null);
INSERT INTO `rnd_variety` VALUES ('8', '2', '2014', '5', '13', 'Sakata 653', '2', '0', '', '444', '45', 'rhhgjhgfg', '1', '1', '1', 'UI-000037', '1422875512', null, null);
INSERT INTO `rnd_variety` VALUES ('9', '1', '2014', '6', '16', 'ffffff', '1', '3', '', '345', '45', 'fghfgh', '1', '1', '1', 'UI-000037', '1422875542', null, null);
INSERT INTO `rnd_variety` VALUES ('10', '2', '2014', '6', '17', 'ttt', '3', '0', 'sup', '666', '56', 'jkgjh', '1', '1', '1', 'UI-000037', '1422875587', null, null);
INSERT INTO `rnd_variety` VALUES ('11', '1', '2014', '7', '18', 'f-567', '1', '8', '', '200', '45', 'hkghkh', '0', '1', '1', 'UI-000037', '1422875626', null, null);
INSERT INTO `rnd_variety` VALUES ('12', '2', '2014', '7', '19', 'shital', '3', '0', 'aci', '60', '200', 'kghghhhhhhhhhhhhhhhhhh', '0', '1', '1', 'UI-000037', '1422875679', null, null);
INSERT INTO `rnd_variety` VALUES ('13', '1', '2014', '8', '23', 'Rider', '1', '5', '', '8', '50', 'hhmdghj', '0', '1', '1', 'UI-000037', '1422875804', null, null);
INSERT INTO `rnd_variety` VALUES ('14', '2', '2014', '8', '23', 'tiya', '3', '0', 'Lal Teer', '6', '10', 'jkhjjjjjj', '0', '1', '1', 'UI-000037', '1422875851', null, null);
INSERT INTO `rnd_variety` VALUES ('15', '1', '2014', '9', '24', 'ugb 111', '1', '7', '', '6', '200', 'fhfj', '0', '1', '1', 'UI-000037', '1422875904', null, null);
INSERT INTO `rnd_variety` VALUES ('16', '2', '2014', '9', '25', '547457', '3', '0', 'aci', '7', '30', 'hjkdghj', '0', '1', '1', 'UI-000037', '1422875941', null, null);
INSERT INTO `rnd_variety` VALUES ('17', '1', '2014', '10', '26', 'rh 45', '1', '4', '', '12', '40', 'yjdyjdj', '0', '1', '1', 'UI-000037', '1422875983', null, null);
INSERT INTO `rnd_variety` VALUES ('18', '2', '2014', '10', '27', 'Rt 56', '3', '0', 'aci', '13', '30', 'jfkxhjfxggg', '0', '1', '1', 'UI-000037', '1422876074', null, null);
INSERT INTO `rnd_variety` VALUES ('19', '1', '2014', '11', '30', 'Rfghj', '2', '0', '', '22', '35', 'dfhdfh', '0', '1', '1', 'UI-000037', '1422876117', null, null);
INSERT INTO `rnd_variety` VALUES ('20', '2', '2014', '11', '29', 'Vbnm', '1', '3', '', '20', '50', 'yfljfljgjh', '0', '1', '1', 'UI-000037', '1422876187', null, null);
INSERT INTO `rnd_variety` VALUES ('21', '1', '2014', '12', '31', 'Sjko', '1', '2', '', '15', '100', 'fjhgtiuy', '0', '1', '1', 'UI-000037', '1422876279', null, null);
INSERT INTO `rnd_variety` VALUES ('22', '1', '2014', '13', '33', 'hvhjvb,j', '1', '8', '', '13', '277', 'gfjhg', '0', '1', '1', 'UI-000037', '1422876314', null, null);
INSERT INTO `rnd_variety` VALUES ('23', '2', '2014', '12', '32', 'Ge45', '2', '0', '', '14', '45', 'bgfjgk', '0', '1', '1', 'UI-000037', '1422876350', null, null);
INSERT INTO `rnd_variety` VALUES ('24', '2', '2014', '13', '34', 'S r', '3', '0', 'hk', '17', '30', 'fluhghjbv', '0', '1', '1', 'UI-000037', '1422876398', null, null);
INSERT INTO `rnd_variety` VALUES ('25', '1', '2014', '14', '35', 'S 35', '1', '4', '', '20', '200', 'gfhjbjk', '0', '1', '1', 'UI-000037', '1422876475', null, null);
INSERT INTO `rnd_variety` VALUES ('26', '2', '2014', '14', '36', 'Sjgjk', '2', '0', '', '10', '30', 'agduykgbn', '0', '1', '1', 'UI-000037', '1422876508', null, null);
INSERT INTO `rnd_variety` VALUES ('27', '1', '2014', '15', '37', 'Ava', '1', '1', '', '20', '30', 'dgyktjhg', '0', '1', '1', 'UI-000037', '1422876567', null, null);
INSERT INTO `rnd_variety` VALUES ('28', '2', '2014', '15', '38', 'Sum', '1', '4', '', '30', '200', 'fcdyfjgb', '0', '1', '1', 'UI-000037', '1422876614', null, null);
INSERT INTO `rnd_variety` VALUES ('29', '1', '2014', '16', '39', 'Deop', '3', '0', 'aci', '45', '390', 'fcnghvcmh', '0', '1', '1', 'UI-000037', '1422876710', null, null);
INSERT INTO `rnd_variety` VALUES ('30', '2', '2014', '16', '39', 'gfkyg', '2', '0', '', '45', '390', 'chmvjb.', '0', '1', '1', 'UI-000037', '1422876765', null, null);
INSERT INTO `rnd_variety` VALUES ('31', '1', '2014', '17', '40', 'yguhk', '1', '5', '', '50', '100', 'fgjhb.k', '0', '1', '1', 'UI-000037', '1422876811', null, null);
INSERT INTO `rnd_variety` VALUES ('32', '2', '2014', '17', '40', 'R45', '3', '0', 'Lal Teer', '35', '200', 'fhfdgd', '0', '1', '1', 'UI-000037', '1422876879', null, null);

-- ----------------------------
-- Table structure for `rnd_variety_season`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_variety_season`;
CREATE TABLE `rnd_variety_season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `season_status` tinyint(4) NOT NULL DEFAULT '0',
  `sample_delivery_status` tinyint(4) NOT NULL DEFAULT '0',
  `sample_size` float NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_variety_season
-- ----------------------------
INSERT INTO `rnd_variety_season` VALUES ('1', '2014', '1', '1', '1', '1', '1', '1', 'UI-000037', '1422696260', 'UI-000037', '1423370642');
INSERT INTO `rnd_variety_season` VALUES ('2', '2014', '1', '2', '1', '0', '0', '1', 'UI-000037', '1422696260', 'UI-000037', '1422696635');
INSERT INTO `rnd_variety_season` VALUES ('3', '2014', '1', '3', '0', '0', '0', '1', 'UI-000037', '1422696260', 'UI-000037', '1422696635');
INSERT INTO `rnd_variety_season` VALUES ('4', '2014', '1', '4', '1', '0', '0', '1', 'UI-000037', '1422696260', 'UI-000037', '1422696635');
INSERT INTO `rnd_variety_season` VALUES ('5', '2014', '1', '5', '0', '0', '0', '1', 'UI-000037', '1422696260', 'UI-000037', '1422696635');
INSERT INTO `rnd_variety_season` VALUES ('6', '2014', '2', '1', '1', '1', '1', '1', 'UI-000037', '1422875192', 'UI-000037', '1423370642');
INSERT INTO `rnd_variety_season` VALUES ('7', '2014', '2', '2', '1', '0', '0', '1', 'UI-000037', '1422875192', null, null);
INSERT INTO `rnd_variety_season` VALUES ('8', '2014', '2', '3', '1', '0', '0', '1', 'UI-000037', '1422875192', null, null);
INSERT INTO `rnd_variety_season` VALUES ('9', '2014', '2', '4', '1', '0', '0', '1', 'UI-000037', '1422875192', null, null);
INSERT INTO `rnd_variety_season` VALUES ('10', '2014', '2', '5', '0', '0', '0', '1', 'UI-000037', '1422875192', null, null);
INSERT INTO `rnd_variety_season` VALUES ('11', '2014', '3', '1', '1', '0', '0', '1', 'UI-000037', '1422875238', 'UI-000037', '1422946782');
INSERT INTO `rnd_variety_season` VALUES ('12', '2014', '3', '2', '0', '0', '0', '1', 'UI-000037', '1422875238', null, null);
INSERT INTO `rnd_variety_season` VALUES ('13', '2014', '3', '3', '1', '0', '0', '1', 'UI-000037', '1422875238', null, null);
INSERT INTO `rnd_variety_season` VALUES ('14', '2014', '3', '4', '1', '0', '0', '1', 'UI-000037', '1422875238', null, null);
INSERT INTO `rnd_variety_season` VALUES ('15', '2014', '3', '5', '0', '0', '0', '1', 'UI-000037', '1422875238', null, null);
INSERT INTO `rnd_variety_season` VALUES ('16', '2014', '4', '1', '1', '0', '0', '1', 'UI-000037', '1422875275', 'UI-000037', '1422946782');
INSERT INTO `rnd_variety_season` VALUES ('17', '2014', '4', '2', '0', '0', '0', '1', 'UI-000037', '1422875275', null, null);
INSERT INTO `rnd_variety_season` VALUES ('18', '2014', '4', '3', '1', '0', '0', '1', 'UI-000037', '1422875275', null, null);
INSERT INTO `rnd_variety_season` VALUES ('19', '2014', '4', '4', '1', '0', '0', '1', 'UI-000037', '1422875275', null, null);
INSERT INTO `rnd_variety_season` VALUES ('20', '2014', '4', '5', '0', '0', '0', '1', 'UI-000037', '1422875275', null, null);
INSERT INTO `rnd_variety_season` VALUES ('21', '2014', '5', '1', '1', '1', '1', '1', 'UI-000037', '1422875321', 'UI-000037', '1423372804');
INSERT INTO `rnd_variety_season` VALUES ('22', '2014', '5', '2', '1', '0', '0', '1', 'UI-000037', '1422875321', null, null);
INSERT INTO `rnd_variety_season` VALUES ('23', '2014', '5', '3', '1', '0', '0', '1', 'UI-000037', '1422875321', null, null);
INSERT INTO `rnd_variety_season` VALUES ('24', '2014', '5', '4', '1', '0', '0', '1', 'UI-000037', '1422875321', null, null);
INSERT INTO `rnd_variety_season` VALUES ('25', '2014', '5', '5', '1', '0', '0', '1', 'UI-000037', '1422875321', null, null);
INSERT INTO `rnd_variety_season` VALUES ('26', '2014', '6', '1', '1', '1', '1', '1', 'UI-000037', '1422875407', 'UI-000037', '1423372804');
INSERT INTO `rnd_variety_season` VALUES ('27', '2014', '6', '2', '1', '0', '0', '1', 'UI-000037', '1422875407', null, null);
INSERT INTO `rnd_variety_season` VALUES ('28', '2014', '6', '3', '1', '0', '0', '1', 'UI-000037', '1422875407', null, null);
INSERT INTO `rnd_variety_season` VALUES ('29', '2014', '6', '4', '1', '0', '0', '1', 'UI-000037', '1422875407', null, null);
INSERT INTO `rnd_variety_season` VALUES ('30', '2014', '6', '5', '1', '0', '0', '1', 'UI-000037', '1422875407', null, null);
INSERT INTO `rnd_variety_season` VALUES ('31', '2014', '7', '1', '1', '0', '0', '1', 'UI-000037', '1422875464', 'UI-000037', '1422946148');
INSERT INTO `rnd_variety_season` VALUES ('32', '2014', '7', '2', '0', '0', '0', '1', 'UI-000037', '1422875464', null, null);
INSERT INTO `rnd_variety_season` VALUES ('33', '2014', '7', '3', '1', '0', '0', '1', 'UI-000037', '1422875464', null, null);
INSERT INTO `rnd_variety_season` VALUES ('34', '2014', '7', '4', '1', '0', '0', '1', 'UI-000037', '1422875464', null, null);
INSERT INTO `rnd_variety_season` VALUES ('35', '2014', '7', '5', '0', '0', '0', '1', 'UI-000037', '1422875464', null, null);
INSERT INTO `rnd_variety_season` VALUES ('36', '2014', '8', '1', '1', '0', '0', '1', 'UI-000037', '1422875512', 'UI-000037', '1422946148');
INSERT INTO `rnd_variety_season` VALUES ('37', '2014', '8', '2', '0', '0', '0', '1', 'UI-000037', '1422875512', null, null);
INSERT INTO `rnd_variety_season` VALUES ('38', '2014', '8', '3', '1', '0', '0', '1', 'UI-000037', '1422875512', null, null);
INSERT INTO `rnd_variety_season` VALUES ('39', '2014', '8', '4', '1', '0', '0', '1', 'UI-000037', '1422875512', null, null);
INSERT INTO `rnd_variety_season` VALUES ('40', '2014', '8', '5', '0', '0', '0', '1', 'UI-000037', '1422875512', null, null);
INSERT INTO `rnd_variety_season` VALUES ('41', '2014', '9', '1', '1', '0', '0', '1', 'UI-000037', '1422875542', 'UI-000037', '1423046445');
INSERT INTO `rnd_variety_season` VALUES ('42', '2014', '9', '2', '0', '0', '0', '1', 'UI-000037', '1422875542', null, null);
INSERT INTO `rnd_variety_season` VALUES ('43', '2014', '9', '3', '1', '0', '0', '1', 'UI-000037', '1422875542', null, null);
INSERT INTO `rnd_variety_season` VALUES ('44', '2014', '9', '4', '1', '0', '0', '1', 'UI-000037', '1422875542', null, null);
INSERT INTO `rnd_variety_season` VALUES ('45', '2014', '9', '5', '0', '0', '0', '1', 'UI-000037', '1422875542', null, null);
INSERT INTO `rnd_variety_season` VALUES ('46', '2014', '10', '1', '1', '0', '0', '1', 'UI-000037', '1422875587', 'UI-000037', '1423046445');
INSERT INTO `rnd_variety_season` VALUES ('47', '2014', '10', '2', '0', '0', '0', '1', 'UI-000037', '1422875587', null, null);
INSERT INTO `rnd_variety_season` VALUES ('48', '2014', '10', '3', '1', '0', '0', '1', 'UI-000037', '1422875587', null, null);
INSERT INTO `rnd_variety_season` VALUES ('49', '2014', '10', '4', '1', '0', '0', '1', 'UI-000037', '1422875587', null, null);
INSERT INTO `rnd_variety_season` VALUES ('50', '2014', '10', '5', '0', '0', '0', '1', 'UI-000037', '1422875587', null, null);
INSERT INTO `rnd_variety_season` VALUES ('51', '2014', '11', '1', '1', '0', '0', '1', 'UI-000037', '1422875626', 'UI-000037', '1423046457');
INSERT INTO `rnd_variety_season` VALUES ('52', '2014', '11', '2', '0', '0', '0', '1', 'UI-000037', '1422875626', null, null);
INSERT INTO `rnd_variety_season` VALUES ('53', '2014', '11', '3', '1', '0', '0', '1', 'UI-000037', '1422875626', null, null);
INSERT INTO `rnd_variety_season` VALUES ('54', '2014', '11', '4', '1', '0', '0', '1', 'UI-000037', '1422875626', null, null);
INSERT INTO `rnd_variety_season` VALUES ('55', '2014', '11', '5', '0', '0', '0', '1', 'UI-000037', '1422875626', null, null);
INSERT INTO `rnd_variety_season` VALUES ('56', '2014', '12', '1', '1', '0', '0', '1', 'UI-000037', '1422875679', 'UI-000037', '1423046457');
INSERT INTO `rnd_variety_season` VALUES ('57', '2014', '12', '2', '0', '0', '0', '1', 'UI-000037', '1422875679', null, null);
INSERT INTO `rnd_variety_season` VALUES ('58', '2014', '12', '3', '1', '0', '0', '1', 'UI-000037', '1422875679', null, null);
INSERT INTO `rnd_variety_season` VALUES ('59', '2014', '12', '4', '1', '0', '0', '1', 'UI-000037', '1422875679', null, null);
INSERT INTO `rnd_variety_season` VALUES ('60', '2014', '12', '5', '0', '0', '0', '1', 'UI-000037', '1422875679', null, null);
INSERT INTO `rnd_variety_season` VALUES ('61', '2014', '13', '1', '1', '0', '0', '1', 'UI-000037', '1422875804', 'UI-000037', '1423046465');
INSERT INTO `rnd_variety_season` VALUES ('62', '2014', '13', '2', '0', '0', '0', '1', 'UI-000037', '1422875804', null, null);
INSERT INTO `rnd_variety_season` VALUES ('63', '2014', '13', '3', '1', '0', '0', '1', 'UI-000037', '1422875804', null, null);
INSERT INTO `rnd_variety_season` VALUES ('64', '2014', '13', '4', '0', '0', '0', '1', 'UI-000037', '1422875804', null, null);
INSERT INTO `rnd_variety_season` VALUES ('65', '2014', '13', '5', '0', '0', '0', '1', 'UI-000037', '1422875804', null, null);
INSERT INTO `rnd_variety_season` VALUES ('66', '2014', '14', '1', '1', '0', '0', '1', 'UI-000037', '1422875851', 'UI-000037', '1423046465');
INSERT INTO `rnd_variety_season` VALUES ('67', '2014', '14', '2', '0', '0', '0', '1', 'UI-000037', '1422875851', null, null);
INSERT INTO `rnd_variety_season` VALUES ('68', '2014', '14', '3', '1', '0', '0', '1', 'UI-000037', '1422875851', null, null);
INSERT INTO `rnd_variety_season` VALUES ('69', '2014', '14', '4', '0', '0', '0', '1', 'UI-000037', '1422875851', null, null);
INSERT INTO `rnd_variety_season` VALUES ('70', '2014', '14', '5', '0', '0', '0', '1', 'UI-000037', '1422875851', null, null);
INSERT INTO `rnd_variety_season` VALUES ('71', '2014', '15', '1', '1', '0', '0', '1', 'UI-000037', '1422875904', 'UI-000037', '1423046483');
INSERT INTO `rnd_variety_season` VALUES ('72', '2014', '15', '2', '0', '0', '0', '1', 'UI-000037', '1422875904', null, null);
INSERT INTO `rnd_variety_season` VALUES ('73', '2014', '15', '3', '1', '0', '0', '1', 'UI-000037', '1422875904', null, null);
INSERT INTO `rnd_variety_season` VALUES ('74', '2014', '15', '4', '1', '0', '0', '1', 'UI-000037', '1422875904', null, null);
INSERT INTO `rnd_variety_season` VALUES ('75', '2014', '15', '5', '0', '0', '0', '1', 'UI-000037', '1422875904', null, null);
INSERT INTO `rnd_variety_season` VALUES ('76', '2014', '16', '1', '1', '0', '0', '1', 'UI-000037', '1422875941', 'UI-000037', '1423046483');
INSERT INTO `rnd_variety_season` VALUES ('77', '2014', '16', '2', '0', '0', '0', '1', 'UI-000037', '1422875941', null, null);
INSERT INTO `rnd_variety_season` VALUES ('78', '2014', '16', '3', '1', '0', '0', '1', 'UI-000037', '1422875941', null, null);
INSERT INTO `rnd_variety_season` VALUES ('79', '2014', '16', '4', '1', '0', '0', '1', 'UI-000037', '1422875941', null, null);
INSERT INTO `rnd_variety_season` VALUES ('80', '2014', '16', '5', '0', '0', '0', '1', 'UI-000037', '1422875941', null, null);
INSERT INTO `rnd_variety_season` VALUES ('81', '2014', '17', '1', '1', '0', '0', '1', 'UI-000037', '1422875983', 'UI-000037', '1423046491');
INSERT INTO `rnd_variety_season` VALUES ('82', '2014', '17', '2', '0', '0', '0', '1', 'UI-000037', '1422875983', null, null);
INSERT INTO `rnd_variety_season` VALUES ('83', '2014', '17', '3', '1', '0', '0', '1', 'UI-000037', '1422875983', null, null);
INSERT INTO `rnd_variety_season` VALUES ('84', '2014', '17', '4', '1', '0', '0', '1', 'UI-000037', '1422875983', null, null);
INSERT INTO `rnd_variety_season` VALUES ('85', '2014', '17', '5', '0', '0', '0', '1', 'UI-000037', '1422875983', null, null);
INSERT INTO `rnd_variety_season` VALUES ('86', '2014', '18', '1', '1', '0', '0', '1', 'UI-000037', '1422876074', 'UI-000037', '1423046491');
INSERT INTO `rnd_variety_season` VALUES ('87', '2014', '18', '2', '0', '0', '0', '1', 'UI-000037', '1422876074', null, null);
INSERT INTO `rnd_variety_season` VALUES ('88', '2014', '18', '3', '1', '0', '0', '1', 'UI-000037', '1422876074', null, null);
INSERT INTO `rnd_variety_season` VALUES ('89', '2014', '18', '4', '0', '0', '0', '1', 'UI-000037', '1422876074', null, null);
INSERT INTO `rnd_variety_season` VALUES ('90', '2014', '18', '5', '0', '0', '0', '1', 'UI-000037', '1422876074', null, null);
INSERT INTO `rnd_variety_season` VALUES ('91', '2014', '19', '1', '1', '0', '0', '1', 'UI-000037', '1422876117', 'UI-000037', '1423046502');
INSERT INTO `rnd_variety_season` VALUES ('92', '2014', '19', '2', '0', '0', '0', '1', 'UI-000037', '1422876117', null, null);
INSERT INTO `rnd_variety_season` VALUES ('93', '2014', '19', '3', '1', '0', '0', '1', 'UI-000037', '1422876117', null, null);
INSERT INTO `rnd_variety_season` VALUES ('94', '2014', '19', '4', '0', '0', '0', '1', 'UI-000037', '1422876117', null, null);
INSERT INTO `rnd_variety_season` VALUES ('95', '2014', '19', '5', '0', '0', '0', '1', 'UI-000037', '1422876117', null, null);
INSERT INTO `rnd_variety_season` VALUES ('96', '2014', '20', '1', '1', '0', '0', '1', 'UI-000037', '1422876187', 'UI-000037', '1423046502');
INSERT INTO `rnd_variety_season` VALUES ('97', '2014', '20', '2', '0', '0', '0', '1', 'UI-000037', '1422876187', null, null);
INSERT INTO `rnd_variety_season` VALUES ('98', '2014', '20', '3', '1', '0', '0', '1', 'UI-000037', '1422876187', null, null);
INSERT INTO `rnd_variety_season` VALUES ('99', '2014', '20', '4', '0', '0', '0', '1', 'UI-000037', '1422876187', null, null);
INSERT INTO `rnd_variety_season` VALUES ('100', '2014', '20', '5', '0', '0', '0', '1', 'UI-000037', '1422876187', null, null);
INSERT INTO `rnd_variety_season` VALUES ('101', '2014', '21', '1', '1', '0', '0', '1', 'UI-000037', '1422876279', 'UI-000037', '1423046512');
INSERT INTO `rnd_variety_season` VALUES ('102', '2014', '21', '2', '0', '0', '0', '1', 'UI-000037', '1422876279', null, null);
INSERT INTO `rnd_variety_season` VALUES ('103', '2014', '21', '3', '1', '0', '0', '1', 'UI-000037', '1422876279', null, null);
INSERT INTO `rnd_variety_season` VALUES ('104', '2014', '21', '4', '0', '0', '0', '1', 'UI-000037', '1422876279', null, null);
INSERT INTO `rnd_variety_season` VALUES ('105', '2014', '21', '5', '0', '0', '0', '1', 'UI-000037', '1422876279', null, null);
INSERT INTO `rnd_variety_season` VALUES ('106', '2014', '22', '1', '1', '0', '0', '1', 'UI-000037', '1422876314', 'UI-000037', '1423046526');
INSERT INTO `rnd_variety_season` VALUES ('107', '2014', '22', '2', '0', '0', '0', '1', 'UI-000037', '1422876314', null, null);
INSERT INTO `rnd_variety_season` VALUES ('108', '2014', '22', '3', '1', '0', '0', '1', 'UI-000037', '1422876314', null, null);
INSERT INTO `rnd_variety_season` VALUES ('109', '2014', '22', '4', '0', '0', '0', '1', 'UI-000037', '1422876314', null, null);
INSERT INTO `rnd_variety_season` VALUES ('110', '2014', '22', '5', '0', '0', '0', '1', 'UI-000037', '1422876314', null, null);
INSERT INTO `rnd_variety_season` VALUES ('111', '2014', '23', '1', '1', '0', '0', '1', 'UI-000037', '1422876350', 'UI-000037', '1423046512');
INSERT INTO `rnd_variety_season` VALUES ('112', '2014', '23', '2', '0', '0', '0', '1', 'UI-000037', '1422876350', null, null);
INSERT INTO `rnd_variety_season` VALUES ('113', '2014', '23', '3', '1', '0', '0', '1', 'UI-000037', '1422876350', null, null);
INSERT INTO `rnd_variety_season` VALUES ('114', '2014', '23', '4', '0', '0', '0', '1', 'UI-000037', '1422876350', null, null);
INSERT INTO `rnd_variety_season` VALUES ('115', '2014', '23', '5', '0', '0', '0', '1', 'UI-000037', '1422876350', null, null);
INSERT INTO `rnd_variety_season` VALUES ('116', '2014', '24', '1', '1', '0', '0', '1', 'UI-000037', '1422876398', 'UI-000037', '1423046526');
INSERT INTO `rnd_variety_season` VALUES ('117', '2014', '24', '2', '0', '0', '0', '1', 'UI-000037', '1422876398', null, null);
INSERT INTO `rnd_variety_season` VALUES ('118', '2014', '24', '3', '1', '0', '0', '1', 'UI-000037', '1422876398', null, null);
INSERT INTO `rnd_variety_season` VALUES ('119', '2014', '24', '4', '0', '0', '0', '1', 'UI-000037', '1422876398', null, null);
INSERT INTO `rnd_variety_season` VALUES ('120', '2014', '24', '5', '0', '0', '0', '1', 'UI-000037', '1422876398', null, null);
INSERT INTO `rnd_variety_season` VALUES ('121', '2014', '25', '1', '1', '0', '0', '1', 'UI-000037', '1422876475', 'UI-000037', '1423046541');
INSERT INTO `rnd_variety_season` VALUES ('122', '2014', '25', '2', '0', '0', '0', '1', 'UI-000037', '1422876475', null, null);
INSERT INTO `rnd_variety_season` VALUES ('123', '2014', '25', '3', '1', '0', '0', '1', 'UI-000037', '1422876475', null, null);
INSERT INTO `rnd_variety_season` VALUES ('124', '2014', '25', '4', '0', '0', '0', '1', 'UI-000037', '1422876475', null, null);
INSERT INTO `rnd_variety_season` VALUES ('125', '2014', '25', '5', '0', '0', '0', '1', 'UI-000037', '1422876475', null, null);
INSERT INTO `rnd_variety_season` VALUES ('126', '2014', '26', '1', '1', '0', '0', '1', 'UI-000037', '1422876508', 'UI-000037', '1423046541');
INSERT INTO `rnd_variety_season` VALUES ('127', '2014', '26', '2', '0', '0', '0', '1', 'UI-000037', '1422876508', null, null);
INSERT INTO `rnd_variety_season` VALUES ('128', '2014', '26', '3', '1', '0', '0', '1', 'UI-000037', '1422876508', null, null);
INSERT INTO `rnd_variety_season` VALUES ('129', '2014', '26', '4', '0', '0', '0', '1', 'UI-000037', '1422876508', null, null);
INSERT INTO `rnd_variety_season` VALUES ('130', '2014', '26', '5', '0', '0', '0', '1', 'UI-000037', '1422876508', null, null);
INSERT INTO `rnd_variety_season` VALUES ('131', '2014', '27', '1', '1', '0', '0', '1', 'UI-000037', '1422876567', 'UI-000037', '1423046549');
INSERT INTO `rnd_variety_season` VALUES ('132', '2014', '27', '2', '0', '0', '0', '1', 'UI-000037', '1422876567', null, null);
INSERT INTO `rnd_variety_season` VALUES ('133', '2014', '27', '3', '1', '0', '0', '1', 'UI-000037', '1422876567', null, null);
INSERT INTO `rnd_variety_season` VALUES ('134', '2014', '27', '4', '0', '0', '0', '1', 'UI-000037', '1422876567', null, null);
INSERT INTO `rnd_variety_season` VALUES ('135', '2014', '27', '5', '0', '0', '0', '1', 'UI-000037', '1422876567', null, null);
INSERT INTO `rnd_variety_season` VALUES ('136', '2014', '28', '1', '1', '0', '0', '1', 'UI-000037', '1422876614', 'UI-000037', '1423046549');
INSERT INTO `rnd_variety_season` VALUES ('137', '2014', '28', '2', '0', '0', '0', '1', 'UI-000037', '1422876614', null, null);
INSERT INTO `rnd_variety_season` VALUES ('138', '2014', '28', '3', '1', '0', '0', '1', 'UI-000037', '1422876614', null, null);
INSERT INTO `rnd_variety_season` VALUES ('139', '2014', '28', '4', '0', '0', '0', '1', 'UI-000037', '1422876614', null, null);
INSERT INTO `rnd_variety_season` VALUES ('140', '2014', '28', '5', '0', '0', '0', '1', 'UI-000037', '1422876614', null, null);
INSERT INTO `rnd_variety_season` VALUES ('141', '2014', '29', '1', '1', '0', '0', '1', 'UI-000037', '1422876710', null, null);
INSERT INTO `rnd_variety_season` VALUES ('142', '2014', '29', '2', '0', '0', '0', '1', 'UI-000037', '1422876710', null, null);
INSERT INTO `rnd_variety_season` VALUES ('143', '2014', '29', '3', '1', '0', '0', '1', 'UI-000037', '1422876710', null, null);
INSERT INTO `rnd_variety_season` VALUES ('144', '2014', '29', '4', '0', '0', '0', '1', 'UI-000037', '1422876710', null, null);
INSERT INTO `rnd_variety_season` VALUES ('145', '2014', '29', '5', '0', '0', '0', '1', 'UI-000037', '1422876710', null, null);
INSERT INTO `rnd_variety_season` VALUES ('146', '2014', '30', '1', '1', '0', '0', '1', 'UI-000037', '1422876765', null, null);
INSERT INTO `rnd_variety_season` VALUES ('147', '2014', '30', '2', '0', '0', '0', '1', 'UI-000037', '1422876765', null, null);
INSERT INTO `rnd_variety_season` VALUES ('148', '2014', '30', '3', '1', '0', '0', '1', 'UI-000037', '1422876765', null, null);
INSERT INTO `rnd_variety_season` VALUES ('149', '2014', '30', '4', '0', '0', '0', '1', 'UI-000037', '1422876765', null, null);
INSERT INTO `rnd_variety_season` VALUES ('150', '2014', '30', '5', '1', '0', '0', '1', 'UI-000037', '1422876765', null, null);
INSERT INTO `rnd_variety_season` VALUES ('151', '2014', '31', '1', '1', '0', '0', '1', 'UI-000037', '1422876811', 'UI-000037', '1423046556');
INSERT INTO `rnd_variety_season` VALUES ('152', '2014', '31', '2', '0', '0', '0', '1', 'UI-000037', '1422876811', null, null);
INSERT INTO `rnd_variety_season` VALUES ('153', '2014', '31', '3', '1', '0', '0', '1', 'UI-000037', '1422876811', null, null);
INSERT INTO `rnd_variety_season` VALUES ('154', '2014', '31', '4', '0', '0', '0', '1', 'UI-000037', '1422876811', null, null);
INSERT INTO `rnd_variety_season` VALUES ('155', '2014', '31', '5', '1', '0', '0', '1', 'UI-000037', '1422876811', null, null);
INSERT INTO `rnd_variety_season` VALUES ('156', '2014', '32', '1', '1', '0', '0', '1', 'UI-000037', '1422876879', 'UI-000037', '1423046556');
INSERT INTO `rnd_variety_season` VALUES ('157', '2014', '32', '2', '0', '0', '0', '1', 'UI-000037', '1422876879', null, null);
INSERT INTO `rnd_variety_season` VALUES ('158', '2014', '32', '3', '1', '0', '0', '1', 'UI-000037', '1422876879', null, null);
INSERT INTO `rnd_variety_season` VALUES ('159', '2014', '32', '4', '0', '0', '0', '1', 'UI-000037', '1422876879', null, null);
INSERT INTO `rnd_variety_season` VALUES ('160', '2014', '32', '5', '0', '0', '0', '1', 'UI-000037', '1422876879', null, null);
