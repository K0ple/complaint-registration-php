var faker = require('faker');
var mysql = require('mysql');
const { threadId } = require('worker_threads');

var conn = mysql.createConnection(
    {
        host: 'localhost',
        user: 'root', 
        password: '',
        database: 'tarp_test'
    }
);

var length = 15;
var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
var charactersLength = characters.length;


// var locations = new Array();
// locations.push('Banglore');
// locations.push('Chennai');
// locations.push('Hyderabad');
// locations.push('Mumbai');
// locations.push('Delhi');



// loc = 'Banglore';
// loc = 'Chennai';
// loc = 'Hyderabad';
// loc = 'Mumbai';
loc = 'Delhi';

var data = new Array();

for(var q=1;q<=100;q++)
{
    var user = new Array();
    var user_id = '';
    for ( var i = 0; i < length; i++ ) {
        user_id += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    user.push(user_id);
    name = faker.name.firstName();
    user.push(name);
    user.push(faker.name.lastName());
    user.push('citizen');
    user.push(faker.phone.phoneNumber('+91-##########'));
    user.push(faker.internet.email());
    user.push(name);
    user.push(loc);
    user.push(faker.date.past());
    data.push(user);

    var complaints = new Array();
    var complaint = new Array();
    var dep = 1;
    for(var comp = 1;comp<=8;comp++)
    {
        authority_id = '';
        var q2 = 'SELECT authority_id from authority_details auth join user_details user on auth.authority_id=user.user_id where location = (?) and dept_id=(?)';
        conn.query(q2, [loc, comp], function(error, results, fields)
        {
            if(error) throw error;
            authority_id = results[Math.floor(Math.random() * 10)]['authority_id'];
            // console.log(results);
            // console.log('Authority Id : '+authority_id);
                complaint.push(user_id);
                complaint.push(authority_id);
                complaint.push(dep++);
                if(dep > 8)
                dep = 1;
                complaint.push(loc);
                if(loc>4)
                loc = 0;
                complaint.push(faker.lorem.paragraph());
                complaint.push(faker.date.past());
                complaints.push(complaint);
            //   console.log(complaint);
                var q3 = 'INSERT INTO complaints(user_id, authority_id, dept_id, location, complaint, registered_at) VALUES ?';
                conn.query(q3, [complaints], function(err, results, fields)
                {
                    if(err) throw err;
                //   console.log(results);
                });
                complaint = new Array();
                complaints = new Array();
        });
        function sleep (time) {
            return new Promise((resolve) => setTimeout(resolve, time));
            }
            
            // Usage!
        //   sleep(100).then(() => {
        //       // Do something after the sleep!
                
        //   });
    //    complaints = [];
    }
    var q1 = 'INSERT INTO user_details(user_id, firstname, lastname, usertype, contact, email, password, location, joined_at) VALUES ?';
    conn.query(q1, [data], function(error, results, fields)
    {
        if(error) throw error;
        // console.log(results);
    });
    data = new Array();
    user = new Array();
}
    

    
// console.log(faker.lorem.paragraph());
// sleep(20000).then(() => {
//     conn.end();
// });


