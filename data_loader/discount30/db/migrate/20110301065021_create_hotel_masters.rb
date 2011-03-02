class CreateHotelMasters < ActiveRecord::Migration
  def self.up
    execute %Q{ ALTER TABLE `hotel_master` ADD COLUMN `hotel_logo` TEXT AFTER `flag_mmt`}
    execute %Q{ ALTER TABLE `hotel_master` MODIFY COLUMN `flag_group` INT(1) DEFAULT 0,
 MODIFY COLUMN `hotel_group_id` INT(5) DEFAULT 0,
 MODIFY COLUMN `star_category` INT(1) DEFAULT 0,
 MODIFY COLUMN `flag_ppa` INT(1) DEFAULT 0,
 MODIFY COLUMN `ppa_dt` DATE DEFAULT NULL,
 MODIFY COLUMN `act_dt` DATETIME DEFAULT NULL,
 MODIFY COLUMN `act_desk_id` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
 MODIFY COLUMN `trn_desk_id` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
 MODIFY COLUMN `live_dt` DATETIME DEFAULT NULL,
 MODIFY COLUMN `live_desk_id` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
 MODIFY COLUMN `magic_notes` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL, ROW_FORMAT = DYNAMIC;}
  end

  def self.down
    drop_table :hotel_masters
  end
end
