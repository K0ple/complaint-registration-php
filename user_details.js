var faker = require('faker');
var mysql = require('mysql');

var conn = mysql.createConnection(
    {
        host: 'localhost',
        user: 'root', 
        password: '',
        database: 'tarp_test'
    }
);



// var length = 15;
// var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
// var charactersLength = characters.length;


// var locations = new Array();
// locations.push('Banglore');
// locations.push('Chennai');
// locations.push('Hyderabad');
// locations.push('Mumbai');
// locations.push('Delhi');
// // for(var k=0;k<=4;k++)
// // {
// //     console.log(locations[k]);
// // }
// for(var k=0;k<=4;k++)
// {
//     var local_admin_data = new Array();
//     var local_admin = new Array();
//     var local_admin_id = '';
//     for ( var i = 0; i < length; i++ ) {
//         local_admin_id += characters.charAt(Math.floor(Math.random() * charactersLength));
//     }
//     local_admin.push(local_admin_id);
//     name = faker.name.firstName();
//     local_admin.push(name);
//     local_admin.push(faker.name.lastName());
//     local_admin.push('local_admin');
//     local_admin.push(faker.phone.phoneNumber('+91-##########'));
//     local_admin.push(faker.internet.email());
//     local_admin.push('localadmin');
//     local_admin.push(locations[k]);
//     local_admin.push(faker.date.past());
//     local_admin_data.push(local_admin);

//     var q = 'INSERT INTO user_details(user_id, firstname, lastname, usertype, contact, email, password, location, joined_at) VALUES ?';
//     conn.query(q, [local_admin_data], function(error, results, fields)
//     {
//         if(error) throw error;
//         console.log(results);
//     });
//     var data = new Array();
//     var data1 = new Array();
//     for(var dep=1;dep<=8;dep++)
//     {
//         for(var q=1;q<=10;q++)
//         {
//             var user = new Array();
//             var user1 = new Array();
//             var user_id = '';
//             for ( var i = 0; i < length; i++ ) {
//                 user_id += characters.charAt(Math.floor(Math.random() * charactersLength));
//             }
//             user.push(user_id);
//             user1.push(user_id);
//             user1.push(dep);
//             user1.push(local_admin_id);
//             name = faker.name.firstName();
//             user.push(name);
//             user.push(faker.name.lastName());
//             user.push('authority');
//             user.push(faker.phone.phoneNumber('+91-##########'));
//             user.push(faker.internet.email());
//             user.push(name);
//             user.push(locations[k]);
//             user.push(faker.date.past());
//             data.push(user);
//             data1.push(user1);
//         }
//     }
//     var q1 = 'INSERT INTO user_details(user_id, firstname, lastname, usertype, contact, email, password, location, joined_at) VALUES ?';
//     conn.query(q1, [data], function(error, results, fields)
//     {
//         if(error) throw error;
//         console.log(results);
//     });

//     var q2 = 'INSERT INTO authority_details(authority_id, dept_id, local_admin_id) VALUES ?';
//     conn.query(q2, [data1], function(error, results, fields)
//     {
//         if(error) throw error;
//         console.log(results);
//     });
// }

// for(var k=0;k<=4;k++)
// {
//     var data = new Array();

//     for(var q=1;q<=100;q++)
//     {
//         var user = new Array();
//         var user_id = '';
//         for ( var i = 0; i < length; i++ ) {
//             user_id += characters.charAt(Math.floor(Math.random() * charactersLength));
//         }
//         user.push(user_id);
//         name = faker.name.firstName();
//         user.push(name);
//         user.push(faker.name.lastName());
//         user.push('citizen');
//         user.push(faker.phone.phoneNumber('+91-##########'));
//         user.push(faker.internet.email());
//         user.push(name);
//         user.push(locations[k]);
//         user.push(faker.date.past());
//         data.push(user);
//     }

//     var q1 = 'INSERT INTO dummy_users(user_id, firstname, lastname, usertype, contact, email, password, location, joined_at) VALUES ?';
//     conn.query(q1, [data], function(error, results, fields)
//     {
//         if(error) throw error;
//         console.log(results);
//     });
// }



// var q2 = "SELECT complaint_id from complaints where status = 'solved'";
// var q3 = "INSERT INTO reviews(complaint_id, review) VALUES ?";

// conn.query(q2, function(err, results, fields)
// {
//     if(err) throw error;
//     // console.log(results);
//     var data = new Array();
//     for(var i=0;i<results.length;i++)
//     {
//         var review = new Array();
//         review.push(results[i]['complaint_id']);
//         review.push(Math.random().toString(36).substring(7));
//         data.push(review);
//     }
//     conn.query(q3, [data], function(error, results, fields)
//     {
//         if(error) throw error;
//         console.log(results);
//     });
// });


var q4 = "SELECT complaint_id from complaints where status = 'taken_up_by_authority'";
var q5 = "INSERT INTO messages(complaint_id, msg) VALUES ?";

conn.query(q4, function(err, results, fields)
{
    if(err) throw error;
    // console.log(results);
    var data = new Array();
    for(var i=0;i<results.length;i++)
    {
        if(i%5 == 0)
        {
            var msg = new Array();
            msg.push(results[i]['complaint_id']);
            msg.push(Math.random().toString(36).substring(7));
            data.push(msg);
        }
        
    }
    conn.query(q5, [data], function(error, results, fields)
    {
        if(error) throw error;
        console.log(results);
    });
});


// conn.end();
