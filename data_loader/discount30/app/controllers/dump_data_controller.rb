require 'crack'
class DumpDataController < ApplicationController
  def index
    xml = File.read("public/xml/getcityhotels.xml")
    @result = Crack::XML.parse(xml)
    hotels = @result["magic"]["hotels"]
    for hotel in hotels
      basic_info = hotel["info_res"]["hotel_info"]["basic_info"]

      hotel_id = basic_info["hotel_id"]
      hotel_name = basic_info["hotel_name"]

      address1 = basic_info["hotel_address"]["hotel_add1"]
      address2 = basic_info["hotel_address"]["hotel_add2"]
      address3 = basic_info["hotel_address"]["hotel_add3"]
      city = basic_info["hotel_address"]["hotel_city"]
      state = basic_info["hotel_address"]["hotel_state"]
      country = basic_info["hotel_address"]["hotel_country"]
      zip = basic_info["hotel_address"]["hotel_zip"]

      phone1 = basic_info["hotel_contacts"]["phone1"]
      phone2 = basic_info["hotel_contacts"]["phone2"]

      logo = ""
      images = hotel["info_res"]["hotel_info"]["images"]["image"]
      for img in images
        if img["img_title"] == "Logo"
          logo = img["img_url"]
          break
        end
      end

      mhotel = HotelMaster.new(:hotel_id => hotel_id, :hotel_name=> hotel_name, :hotel_add1=> address1,
        :hotel_add2=> address2, :hotel_add3=> address3, :hotel_city=> city, :hotel_state=> state,
        :hotel_country=> country, :hotel_zip=> zip, :hotel_phone1=> phone1, :hotel_phone2=> phone2,
        :hotel_logo=> logo)

      mhotel.save!

      rooms = hotel["info_res"]["hotel_info"]["room_types"]["room"]
      
      if rooms.class == Hash
        room_type_id = rooms["room_type_id"]
        room_type_name = rooms["room_type_name"]
        room_desc = rooms["room_desc"]
        room_single_flag = rooms["single_occupancy_flag"]
        room_double_flag = rooms["double_occupancy_flag"]
        room_triple_flag = rooms["triple_occupancy_flag"]
        max_pax = rooms["max_pax"]
        inclusions = rooms["inclusions"]
        photo = rooms["img_url"]
        ht_room = HotelRoomType.new(:hotel_id=> mhotel.hotel_id, :room_type_id=> room_type_id, :room_type_name=> room_type_name,
            :room_type_desc=> room_desc, :flag_single=> room_single_flag, :flag_double=> room_double_flag, :flag_triple=> room_triple_flag,
            :max_pax=> max_pax, :inclusions=> inclusions, :photo=> photo)
        ht_room.save!
      else
        for room in rooms
          room_type_id = room["room_type_id"]
          room_type_name = room["room_type_name"]
          room_desc = room["room_desc"]
          room_single_flag = room["single_occupancy_flag"]
          room_double_flag = room["double_occupancy_flag"]
          room_triple_flag = room["triple_occupancy_flag"]
          max_pax = room["max_pax"]
          inclusions = room["inclusions"]
          photo = room["img_url"]
          ht_room = HotelRoomType.new(:hotel_id=> mhotel.hotel_id, :room_type_id=> room_type_id, :room_type_name=> room_type_name,
            :room_type_desc=> room_desc, :flag_single=> room_single_flag, :flag_double=> room_double_flag, :flag_triple=> room_triple_flag,
            :max_pax=> max_pax, :inclusions=> inclusions, :photo=> photo)
          ht_room.save!
        end
      end
    end
  end
end
