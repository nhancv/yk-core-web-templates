/**
 * Created by nhancao on 5/18/16.
 */
/*Unit table
 years	y
 quarters	Q
 months	M
 weeks	w
 days	d
 hours	h
 minutes	m
 seconds	s
 milliseconds	ms*/
angular.module('app.models', [])
    .constant("mBase", {
        host: "http://webtemplates.vn",
        dbname: "yk",
        expireTimeout: 1,
        expireTimeoutUnit: "d",
        KEYSTORAGE: {
            EXPIRETIME: "expireTime_key"
        },

        MSG: {
            SUCCESS: "apiCallSuccess",
            ERROR: "apiCallError"
        },

        //User
        type: ['Owner', 'Assistant', 'Partner', 'Shipper'],
        block: ['Normal', 'Block', 'Wait accept'],
        user: {
            "uid": null,
            "pid": null,
            "password": null,
            "name": null,
            "phone": null,
            "address": null,
            "type": 0,
            "block": 0,
            "create_date": null,
            "update_date": null,
            "author": null
        },

        //Customer
        cus_type: ['Normal', 'Special'],
        yn_type: ['No', 'Yes'],
        boolean_type: [false, true],
        cus_rank: ['BEGINNER', 'CLOSER'],
        customer: {
            "uid": null,
            "pid": null,
            "name": null,
            "fb_account": null,
            "phone": null,
            "address": null,
            "hcm": 1, //1: in HCM, 0: otherwise
            "type": 0, //0: normal, 1: special customer
            "rank": 0, //beginner, closer
            "point": 0,
            "black_list": 0, //0: not in blacklist
            "notes": "",
            "create_date": null,
            "update_date": null,
            "author": null
        },

        //Shipping
        ship_type: ['HCM', 'EMS'],
        shipping: {
            "uid": null,
            "pid": null,
            "name": null,
            "price": 0,
            "type": 1, //0: in hcm, 1: EMS
            "create_date": null,
            "update_date": null,
            "author": null
        },

        //Product
        prod_type: ['Other', 'Nhẫn', 'Dây chuyền', 'Lắc'],
        product: {
            "uid": null,
            "pid": null,
            "name": null,
            "material": null,
            "size": null,
            "color": null,
            "description": null,
            "type": 0, //0: Other, 1: Nhan, 2:Day chuyen, 3: Lac
            "price": 0,
            "special_price": 0,
            "promotional_price": 0,
            "promotional_price_from_date": null,
            "promotional_price_to_date": null,
            "create_date": null,
            "update_date": null,
            "author": null,
            "notes": null
        },

        //Stock
        stock: {
            "uid": null,
            "pid": null,
            "usr_id": null,
            "prod_id": null,
            "amount": 1,
            "in_stock": 1, //0: false, 1: true
            "available_date": null,
            "flexible_date": null,
            "create_date": null,
            "update_date": null,
            "author": null,
            "user_name": null, //only show
            "product_name": null //only show
        },

        //Transaction
        payment_type: ['In person', 'Transfer'],
        transaction_status: ['Preparing', 'Posting', 'Going', 'Received'],
        transaction: {
            "uid": null,
            "pid": null,
            "cus_id": null,
            "prod_id": null,
            "usr_id": null,
            "cus_type": 0, //0: Normal, 1: Special cus
            "amount": 1,
            "payment_type": 0, //0: In person, 1: Transfer
            "ship_id": null,
            "price_total": 0,
            "subscription_date": null,
            "delivery_date": null,
            "receiving_date": null,
            "sender": null,
            "status": 0, //0: Preparing, 1: Posting, 2: Going, 3: Received
            "create_date": null,
            "update_date": null,
            "author": null,
            "notes": null,
            "user_name": null,
            "product_name": null,
            "cus_name": null,
            "ship_name": null
        }

    })


;