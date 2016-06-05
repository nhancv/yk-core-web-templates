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
        }

    })


;