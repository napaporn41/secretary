$(document).ready(function() {
    var title = $('secretary').text();
    switch (title) {

        // //Articles ครุภัณฑ์ Insert 
        // case "insert_durable_articles_purchase":  //จัดซื้อ 
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .purchase').addClass('active');
        //     break;

        // case "insert_durable_articles": //ครุภัณฑ์
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .insert').addClass('active');
        //     break;

        // case "insert_durable_articles_damage":  //ชำรุด
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .insertdamage').addClass('active');
        //     break;

        // case "insert_durable_articles_donate":  // บริจาค
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .insertdonate').addClass('active');
        //     break;

        //  case "insert_durable_articles_transfer_in":  //โอนเข้า
        //      $('.nav-articles').addClass('active');
        //      $('.collapse-articles').addClass('show');
        //      $('.collapse-articles .transfer').addClass('active');
        //      break;

        // case "insert_durable_articles_permits":  // ยืมคืน 
        //      $('.nav-articles').addClass('active');
        //      $('.collapse-articles').addClass('show');
        //      $('.collapse-articles .insertpermits').addClass('active');
        //      break;



            // Articles ครุภัณฑ์ Display

        case "display_durable_articles_permits":  // ยืมคืน 
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .permits').addClass('active');
            break;
<<<<<<< HEAD

         case "display_durable_articles":   //ครุภัณฑ์
=======
        case "insert_durable_articles_purchase":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .purchase').addClass('active');
            break
        case "insert_durable_articles_receive_donate":
        case "display_durable_articles":
>>>>>>> 151864a7952e428ae8c593519ec9d1d819c8fcad
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .display').addClass('active');
            break;

        case "display_durable_articles_damage":   //ชำรุด
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .damage').addClass('active');
<<<<<<< HEAD
            break;

        case "display_durable_articles_donate":  // บริจาค
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .donate').addClass('active');
            break;

        case "display_durable_articles_transfer_in":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .transfer').addClass('active');
            break;
        
        case "display_durable_articles_purchase":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .purchase').addClass('active');
            break;

        case "display_durable_articles_repair":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .repair').addClass('active');
            break;

        case "display_durable_articles_sell":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .sell').addClass('active');
            break;

        


        //     // Material  วัสดุคงทน Insert

        // case "insert_durable_material_donate":    //บริจาค
        //     $('.nav-material').addClass('active');
        //     $('.collapse-material').addClass('show');
        //     $('.collapse-material .insertdonates').addClass('active');
        //     break;

        // case "insert_durable_material_damage":  //ชำรุด
        //     $('.nav-material').addClass('active');
        //     $('.collapse-material').addClass('show');
        //     $('.collapse-material .insertdamage').addClass('active');
        //     break;
        
        // case "insert_suplies_distribute":  //แจกจ่าย
        //     $('.nav-supplies').addClass('active');
        //     $('.collapse-supplies').addClass('show');
        //     $('.collapse-supplies .insertdistribute').addClass('active');
        //     break;
 


             // Material  วัสดุคงทน Display

        case "display_durable_material":  //วัสดุ
             $('.nav-material').addClass('active');
             $('.collapse-material').addClass('show');
             $('.collapse-material .display').addClass('active');
             break;
             
        case "display_durable_material_donate":  //บริจาค
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .donates').addClass('active');
            break;

        case "display_durable_material_damage":  //ชำรุด
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .damage').addClass('active');
            break;

        case "display_durable_material_sell":  //ขายทอดตลาด
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .sell').addClass('active');
            break;

        case "display_durable_material_purchase":  //จัดซื้อ
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .purchase').addClass('active');
            break;

        case "display_durable_material_repair":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .repair').addClass('active');
            break;

        case "display_durable_material_permits":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .permits').addClass('active');
            break;

        case "display_durable_material_transfer_in":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .transfer').addClass('active');
            break;

        


            //Supplies วัสดุสิ้นเปลือง

        case "display_suplies_distribute":    //แจกจ่าย
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .distribute').addClass('active');
            break;

        case "display_supplies":  //วัสดุสิ้นเปลือง
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .display').addClass('active');
            break;

        case "display_supplies_purchase":  //จัดซื้อ
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .purchase').addClass('active');
            break;

        case "display_supplies_permits":  //จัดซื้อ
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .permits').addClass('active');
            break;

=======
            break
        case "display_durable_articles_donate":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .donate').addClass('active');
            break
        case "insert_durable_articles_repair":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .repair').addClass('active');
        case "insert_durable_articles":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .insert').addClass('active');
            break
=======
         case "display_durable_articles_transfer_in":
             $('.nav-articles').addClass('active');
             $('.collapse-articles').addClass('show');
             $('.collapse-articles .transfer').addClass('active');
             break
         case "insert_durable_articles_transfer_in":
             $('.nav-articles').addClass('active');
             $('.collapse-articles').addClass('show');
             $('.collapse-articles .transfer').addClass('active');
             break
>>>>>>> 945b4252c50b37d7395e101b99fb2adccbcaa8e2
>>>>>>> 151864a7952e428ae8c593519ec9d1d819c8fcad
    }
})