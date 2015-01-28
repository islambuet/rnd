/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50534
Source Host           : 127.0.0.1:3306
Source Database       : armalik_rnd

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2015-01-28 14:44:37
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
INSERT INTO `ait_system_task` VALUES ('ST-000097', 'SM-000011', '', '1', 'Sample Delivery Status', 'general_sample_delivery', '', null, '', '', '', '', '2015-01-17 12:10:38', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000098', 'SM-000009', '', '0', 'Fruit Report Entry', 'trial_fruit_report_entry', '', '', '', '', '', '', '2015-01-06 17:28:35', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000099', 'SM-000009', '', '0', 'Fruit Report', 'trial_fruit_report', '', '', '', '', '', '', '2015-01-06 17:28:40', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000100', 'SM-000012', '', '0', 'Fertilizer Current Stock Report', 'rnd_fertilizer_current_stock', '', null, '', '', '', '', '2015-01-12 15:00:38', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000101', 'SM-000012', '', '0', 'Pesticide Current Stock Report', 'rnd_pesticide_current_stock', '', null, '', '', '', '', '2015-01-12 19:12:23', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000102', 'SM-000012', '', '0', 'Labour Activity Report', 'rnd_labour_activity_report', '', null, '', '', '', '', '2015-01-13 17:18:52', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000103', 'SM-000012', '', '0', 'Procurement Report', 'rnd_procurement_report', '', null, '', '', '', '', '2015-01-17 12:09:45', 'Active');
INSERT INTO `ait_system_task` VALUES ('ST-000104', 'SM-000011', '', '0', 'Crop Info', 'general_crop_info_report', '', null, '', '', '', '', '2015-01-19 11:05:33', 'Active');

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
) ENGINE=InnoDB AUTO_INCREMENT=11210 DEFAULT CHARSET=utf8;

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
INSERT INTO `ait_user_login` VALUES ('1', 'UI-000001', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '0', '', '', '', 'UG-000001', 'super', 'ee96ba35751a964c34782fc0930952c0', null, '0', '2014-05-27 17:13:12', null, 'Active', '0', '31120701.jpg', null, null);
INSERT INTO `ait_user_login` VALUES ('17', 'UI-000002', 'EI-000019', 'Thanvir Salim Noor', 'Warehouse', '0', '', '', 'WI-000001', 'UG-000002', '0012', '912a56303faecda9f092b629cb97c9c8', null, '0', '2014-12-17 16:16:51', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('18', 'UI-000003', 'EI-000020', 'Md. Sanowar Hossain', 'Marketing', '0', '', '', '', 'UG-000005', 'sanowar', '5fb552d46349660d5f1bb19a5589748b', null, '0', '2014-09-02 09:41:02', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('19', 'UI-000004', 'EI-000021', 'Md. Tariqul Islam', 'Marketing', '0', '', '', '', 'UG-000007', '0017', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('20', 'UI-000005', 'EI-000027', 'Dr. Arif Matin ', 'Marketing', '0', '', '', '', 'UG-000006', '009', 'db41d3d6f9a305c69a9325abedc5aab8', null, '0', '2014-12-08 13:20:42', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('21', 'UI-000006', 'EI-000018', 'A.K.M Shahidul Islam', 'Marketing', '0', '', '', '', 'UG-000004', '0010', '70ea1362715c3999c66da263dbadb141', null, '0', '2014-12-30 13:47:05', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('22', 'UI-000007', 'EI-000006', 'Md. Nazmul Kabir', 'Division', 'DI-000002', 'ZI-000005', '', '', 'UG-000008', '0060', 'ac011ca77935a01c3bb14b52a1a571e0', null, '0', '2015-01-06 17:06:41', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('23', 'UI-000008', 'EI-000064', 'Siddique Bazaar', 'Warehouse', '0', '', '', 'WI-000003', 'UG-000002', 'siddique_bazar ', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('24', 'UI-000009', 'EI-000065', 'Rangpur', 'Warehouse', '0', '', '', 'WI-000002', 'UG-000002', 'rangpur', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('25', 'UI-000010', 'EI-000023', 'Md. Zakir Hossain', 'Division', 'DI-000001', '', '', '', 'UG-000008', '0018', '3a648655fda348301400125166e79568', null, '0', '2014-07-10 11:47:23', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('26', 'UI-000011', 'EI-000082', 'Abdus Satter Molla', 'Zone', '', 'ZI-000009', '', '', 'UG-000003', '0050', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-04 18:48:15', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('27', 'UI-000012', 'EI-000066', 'Md. Mojnur Rahman', 'Division', 'DI-000002', '', '', '', 'UG-000008', '0027', '49f0c5d6f2b3c882e6a37dad50de2999', null, '0', '2014-07-10 11:47:30', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('28', 'UI-000013', 'EI-000007', 'Md. Mustafizar Rahman', 'Zone', '0', 'ZI-000007', '', '', 'UG-000003', '0057', '363776a769d5e837d28b47600a6c8ed1', null, '0', '2014-07-07 13:20:44', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('29', 'UI-000014', 'EI-000008', 'Md. Alimuzzaman (Babu)', 'Zone', '', 'ZI-000008', '', '', 'UG-000003', '0054', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-04 18:49:13', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('30', 'UI-000015', 'EI-000011', 'Md. Rezaul Karim', 'Zone', '', 'ZI-000011', '', '', 'UG-000003', '0052', '49f0c5d6f2b3c882e6a37dad50de2999', null, '0', '2014-12-07 14:47:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('31', 'UI-000016', 'EI-000009', 'Md. Abdul Alim', 'Zone', '', 'ZI-000010', '', '', 'UG-000003', '0056', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-04 18:46:21', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('32', 'UI-000017', 'EI-000013', 'Md. Harun-Or-Rashid', 'Zone', '0', 'ZI-000006', '', '', 'UG-000003', '0055', '416106893283dbf1de5deca26a0e0806', null, '0', '2014-07-07 18:25:05', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('33', 'UI-000018', 'EI-000067', 'S.M Sarowar Hossain', 'Zone', '', 'ZI-000004', '', '', 'UG-000003', '0068', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-04 18:49:42', null, 'In Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('34', 'UI-000019', 'EI-000012', 'A.R.M Roknuzzaman Prodhan', 'Zone', '0', 'ZI-000003', '', '', 'UG-000003', '0053', '3a648655fda348301400125166e79568', null, '0', '2014-12-17 09:32:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('35', 'UI-000020', 'EI-000010', 'Md. Abdul hai', 'Zone', '0', 'ZI-000002', '', '', 'UG-000003', '0051', 'd010520096297a86347279e997b542c7', null, '0', '2014-06-24 21:32:49', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('36', 'UI-000021', 'EI-000072', 'Md. Zakir Hossain', 'Zone', '0', 'ZI-000001', '', '', 'UG-000003', '0064', '3a648655fda348301400125166e79568', null, '0', '2014-06-17 11:26:03', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('37', 'UI-000022', 'EI-000005', ' Prantosh Kumar', 'Marketing', '', '', '', '', 'UG-000009', '0061', 'e282f38bf49ccf5d334832445354a5a8', null, '0', '2014-09-18 14:28:09', null, 'Active', '0', null, null, null);
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
INSERT INTO `ait_user_login` VALUES ('49', 'UI-000034', 'EI-000086', 'Md. Tojammel Hoque', 'Zone', '', 'ZI-000010', '', '', 'UG-000003', '0072', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('50', 'UI-000035', 'EI-000084', 'Md. Refayet Ullah Bhuiyan', 'Zone', '', 'ZI-000008', '', '', 'UG-000003', '0070', '3a648655fda348301400125166e79568', null, '0', '2014-12-17 09:40:30', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('51', 'UI-000036', 'EI-000083', 'Md. Masudur Rahman', 'Zone', '', 'ZI-000004', '', '', 'UG-000003', '0071', 'ede396d31627acccc5eea2ee48948339', null, '0', '2014-12-09 16:51:56', null, 'Active', '0', null, null, null);
INSERT INTO `ait_user_login` VALUES ('52', 'UI-000037', 'EI-000001', 'Md. Mizanur Rahman', 'Marketing', '', '', '', '', 'UG-000012', 'rnd', 'ede396d31627acccc5eea2ee48948339', null, '0', '0000-00-00 00:00:00', null, 'Active', '0', null, null, null);

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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_crop
-- ----------------------------
INSERT INTO `rnd_crop` VALUES ('1', 'Cauliflower', 'CF', '2', '2', '1', '1', '10', '123', '1', 'UI-000037', '1422361751', null, null);
INSERT INTO `rnd_crop` VALUES ('2', 'Cabbage', 'CA', '2', '3', '1', '2', '2', '2', '1', 'UI-000037', '1422362919', null, null);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_crop_type
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_history
-- ----------------------------
INSERT INTO `rnd_history` VALUES ('1', '1', 'rnd_crop', '{\"crop_name\":\"Cauliflower\",\"crop_code\":\"CF\",\"crop_width\":\"2\",\"crop_height\":\"2\",\"fruit_type\":\"1\",\"sample_size\":\"1\",\"initial_plants\":\"10\",\"plants_per_hectare\":\"123\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422361751}', 'UI-000037', 'INSERT', '1422361751');
INSERT INTO `rnd_history` VALUES ('2', '2', 'rnd_crop', '{\"crop_name\":\"Cabbage\",\"crop_code\":\"CA\",\"crop_width\":\"3\",\"crop_height\":\"2\",\"fruit_type\":\"1\",\"sample_size\":\"2\",\"initial_plants\":\"2\",\"plants_per_hectare\":\"2\",\"status\":1,\"created_by\":\"UI-000037\",\"creation_date\":1422362919}', 'UI-000037', 'INSERT', '1422362919');
INSERT INTO `rnd_history` VALUES ('3', '1', 'rnd_principal', '{\"principal_name\":\"Principal1\",\"principal_code\":\"P1\",\"contact_person_name\":\"\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"status\":\"1\",\"created_by\":\"UI-000037\",\"creation_date\":1422424688}', 'UI-000037', 'INSERT', '1422424688');
INSERT INTO `rnd_history` VALUES ('4', '1', 'rnd_principal', '{\"principal_name\":\"Principal1\",\"principal_code\":\"P1\",\"contact_person_name\":\"Shaiful Islam\",\"email\":\"shaiful@gmail.com\",\"contact_number\":\"01912564190\",\"address\":\"Address\\r\\n\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422426683}', 'UI-000037', 'UPDATE', '1422426683');
INSERT INTO `rnd_history` VALUES ('5', '2', 'rnd_principal', '{\"principal_name\":\"Principal2\",\"principal_code\":\"P2\",\"contact_person_name\":\"\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"status\":\"1\",\"created_by\":\"UI-000037\",\"creation_date\":1422426749}', 'UI-000037', 'INSERT', '1422426749');
INSERT INTO `rnd_history` VALUES ('6', '2', 'rnd_principal', '{\"principal_name\":\"Principal2\",\"principal_code\":\"P2\",\"contact_person_name\":\"Maraj Hossain\",\"email\":\"maraj@gmail.com\",\"contact_number\":\"01946311456\",\"address\":\" Address \",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422426779}', 'UI-000037', 'UPDATE', '1422426779');
INSERT INTO `rnd_history` VALUES ('7', '2', 'rnd_principal', '{\"principal_name\":\"Principal2\",\"principal_code\":\"P2\",\"contact_person_name\":\"Maraj Hossain\",\"email\":\"maraj@gmail.com\",\"contact_number\":\"01946311456\",\"address\":\" Address \",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422427320}', 'UI-000037', 'UPDATE', '1422427320');
INSERT INTO `rnd_history` VALUES ('8', '1', 'rnd_principal', '{\"principal_name\":\"Principal1\",\"principal_code\":\"P1\",\"contact_person_name\":\"Shaiful Islam\",\"email\":\"shaiful@gmail.com\",\"contact_number\":\"01912564190\",\"address\":\"Address\\r\\n\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422429331}', 'UI-000037', 'UPDATE', '1422429331');
INSERT INTO `rnd_history` VALUES ('9', '2', 'rnd_principal', '{\"principal_name\":\"Principal2\",\"principal_code\":\"P2\",\"contact_person_name\":\"Maraj Hossainnnnn\",\"email\":\"maraj@gmail.commmmm\",\"contact_number\":\"01946311456666\",\"address\":\" Address ssss\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422430749}', 'UI-000037', 'UPDATE', '1422430749');
INSERT INTO `rnd_history` VALUES ('10', '2', 'rnd_principal', '{\"principal_name\":false,\"principal_code\":false,\"contact_person_name\":\"Maraj Hossainnnnn\",\"email\":\"maraj@gmail.commmmm\",\"contact_number\":\"01946311456666\",\"address\":\" Address ssss\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422430889}', 'UI-000037', 'UPDATE', '1422430889');
INSERT INTO `rnd_history` VALUES ('11', '2', 'rnd_principal', '{\"contact_person_name\":\"Maraj Hossainnnnn\",\"email\":\"maraj@gmail.commmmm\",\"contact_number\":\"01946311456666\",\"address\":\" Address ssss\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422430965}', 'UI-000037', 'UPDATE', '1422430965');
INSERT INTO `rnd_history` VALUES ('12', '2', 'rnd_principal', '{\"contact_person_name\":\"Maraj Hossain\",\"email\":\"maraj@gmail.com\",\"contact_number\":\"01946311456\",\"address\":\" Address\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422431009}', 'UI-000037', 'UPDATE', '1422431009');
INSERT INTO `rnd_history` VALUES ('13', '2', 'rnd_principal', '{\"contact_person_name\":\"Maraj Hossain\",\"email\":\"maraj@gmail.com\",\"contact_number\":\"01946311456\",\"address\":\" Address\",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422431018}', 'UI-000037', 'UPDATE', '1422431018');
INSERT INTO `rnd_history` VALUES ('14', '3', 'rnd_principal', '{\"contact_person_name\":\"\",\"email\":\"\",\"contact_number\":\"\",\"address\":\"\",\"status\":\"1\",\"principal_name\":\"Principal3\",\"principal_code\":\"P3\",\"created_by\":\"UI-000037\",\"creation_date\":1422431110}', 'UI-000037', 'INSERT', '1422431110');
INSERT INTO `rnd_history` VALUES ('15', '3', 'rnd_principal', '{\"contact_person_name\":\"Farid Ahmed\",\"email\":\"farid@jukto.com\",\"contact_number\":\"01716564231\",\"address\":\" Address \",\"status\":\"1\",\"modified_by\":\"UI-000037\",\"modification_date\":1422431137}', 'UI-000037', 'UPDATE', '1422431137');

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
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_principal
-- ----------------------------
INSERT INTO `rnd_principal` VALUES ('1', 'Principal1', 'P1', 'Shaiful Islam', 'shaiful@gmail.com', '01912564190', 'Address\r\n', '1', 'UI-000037', '1422424688', 'UI-000037', '1422429331');
INSERT INTO `rnd_principal` VALUES ('2', 'Principal2', 'P2', 'Maraj Hossain', 'maraj@gmail.com', '01946311456', ' Address', '1', 'UI-000037', '1422426749', 'UI-000037', '1422431018');
INSERT INTO `rnd_principal` VALUES ('3', 'Principal3', 'P3', 'Farid Ahmed', 'farid@jukto.com', '01716564231', ' Address ', '1', 'UI-000037', '1422431110', 'UI-000037', '1422431137');

-- ----------------------------
-- Table structure for `rnd_status_fifteen_days_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_status_fifteen_days_report`;
CREATE TABLE `rnd_status_fifteen_days_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `rnd_code` int(11) NOT NULL,
  `sowing_date` tinyint(4) DEFAULT NULL,
  `transplanting_date` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_status_fifteen_days_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_status_flowering_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_status_flowering_report`;
CREATE TABLE `rnd_status_flowering_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `rnd_code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_status_flowering_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_status_fruit_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_status_fruit_report`;
CREATE TABLE `rnd_status_fruit_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `rnd_code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_status_fruit_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_status_harvest_compile_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_status_harvest_compile_report`;
CREATE TABLE `rnd_status_harvest_compile_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `rnd_code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_status_harvest_compile_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_status_harvest_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_status_harvest_report`;
CREATE TABLE `rnd_status_harvest_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `rnd_code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_status_harvest_report
-- ----------------------------

-- ----------------------------
-- Table structure for `rnd_status_yield_report`
-- ----------------------------
DROP TABLE IF EXISTS `rnd_status_yield_report`;
CREATE TABLE `rnd_status_yield_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `rnd_code` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modification_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rnd_status_yield_report
-- ----------------------------
