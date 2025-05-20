const express = require('express');
const mysql = require('mysql');
const bodyparser = require('body-parser');
const app = express();
app.use(bodyparser.urlencoded({extended:true}));

app.get('/' , (req,res)=>{
    res.sendFile(__dirname + '/home.html');
});

app.get('/home' , (req,res)=>{
    res.sendFile(__dirname + '/home.html');
});

app.get('/create' , (req,res)=>{
    res.sendFile(__dirname + '/create.html');
});

app.get('/update' , (req,res)=>{
    res.sendFile(__dirname + '/update.html');
});

app.get('/delete' , (req,res)=>{
    res.sendFile(__dirname + '/delete.html');
});

app.get('/login' , (req,res)=>{
    res.sendFile(__dirname + '/login.html');
});


const conn = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'exam'
    

});
if(conn){
    console.log('connected');
}

app.post('/create' , (req,res)=>{
    const {username,email,password}=req.body;
    const insert = "INSERT INTO day3(username,email,password)VALUES(?,?,?)";
    conn.query(insert,[username,email,password],(err)=>{
        if(err){
            console.error('error' + err.stack);
            return;
        }
    });
    res.redirect('/login');
});


            app.get('/select', (req, res) => {
    const sql = 'SELECT * FROM day3';
    
    conn.query(sql, (err, result) => {
        if (err) {
            console.error('Error: ' + err.stack);
            return res.status(500).send('<center><h3>Server Error</h3></center>');
        }

        let records = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Records</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        <body class="flex justify-center items-center min-h-screen bg-gray-100">
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-3xl">
                <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">User Records</h2>
                <table class="table-auto border-collapse border border-gray-300 w-full">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">USERNAME</th>
                            <th class="px-4 py-2 border">EMAIL</th>
                            <th class="px-4 py-2 border">PASSWORD</th>
                            
                        </tr>
                    </thead>
                    <tbody>
        `;

        result.forEach(row => {
            records += `
                <tr class="hover:bg-gray-200">
                    <td class="px-4 py-2 border">${row.id}</td>
                    <td class="px-4 py-2 border">${row.username}</td>
                    <td class="px-4 py-2 border">${row.email}</td>
                    <td class="px-4 py-2 border">${row.password}</td>
                </tr>
            `;
        });

        records += `
                    </tbody>
                </table>
            </div>
        </body>
        </html>
        `;

        res.send(records);
    });
});
            
            app.post('/update', (req,res)=>{
                const {username,email,password,id}=req.body;
                const update = 'UPDATE day3 SET username=?,email=?,password=? WHERE id=?';
                conn.query(update,[username,email,password,id],(err)=>{
                    if(err){
                        console.error('error', + err.stack);
                        return;
                    }
                });
                res.redirect('/select');
            });

              
            app.post('/delete', (req,res)=>{
                const {id}=req.body;
                const update = 'DELETE FROM day3 WHERE id=?';
                conn.query(update,[id],(err)=>{
                    if(err){
                        console.error('error', + err.stack);
                        return;
                    }
                });
                res.redirect('/select');
            });

          app.post('/login' , (req,res)=>{
                const {username,email,password}= req.body;
                const sql = 'SELECT * FROM day3 WHERE username=? AND email=? AND password=?';
                conn.query(sql,[username,email,password],(err,result)=>{
                    if(err){
                        console.error('error:' + err.stack);
                        return;

                    }

                    if(result.length===0) return res.send('incorect credentions');
                    return res.redirect('/')
                });



            });


app.listen(4000, ()=>{
    console.log(`http://localhost:4000`);
});

