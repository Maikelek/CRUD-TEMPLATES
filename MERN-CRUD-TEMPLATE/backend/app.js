const express = require('express');  //API framework
const mysql = require("mysql");   //Working with mysql database
const cors = require("cors");   //Enabling sending data from frontend to express server

const app = express()
app.use(express.urlencoded({ extended: true }));    //Middleware
app.use(express.json());
app.use(cors())

const db = mysql.createConnection({   //Database connection
    host:"localhost",
    user:"root",
    password:"",
    database:"cat_database"
})

app.get("/", (req, res) => {  //Main page of API
    return res.json("Welcome to the cat database backend server")

})

app.get("/cats", (req, res) => {   //get(method) page of API with all the data from database
  const q = "SELECT * FROM cats"  //SQL query as variable
  db.query(q,(error, data) => {   //Direct database query using our sql query variable
      if(error) return res.json("error")
      return res.json(data)
  })
})

app.post("/cats", (req, res) => {  //post(method) page of API to insert data into database 
    const q = "INSERT INTO cats (`name`, `race`, `age`, `weight`, `photo`) VALUES (?)";
  
    const values = [
      req.body.name,
      req.body.race,
      req.body.age,
      req.body.weight,
      req.body.photo
    ];
  
    db.query(q, [values], (error, data) => {
      if (error) return res.send(error);
      return res.json(data);
    });
  });
  

app.put("/cats/:id", (req, res) => { //put(method) page of API to update data in database 
  const catId = req.params.id;
  const q = "UPDATE cats SET `name`= ?, `race`= ?, `age`= ?, `weight`= ?, `photo`= ? WHERE id = ?";

  const values = [
    req.body.name,
    req.body.race,
    req.body.age,
    req.body.weight,
    req.body.photo
  ];

  db.query(q, [...values,catId], (err, data) => {
    if (err) return res.send(err);
    return res.json("Cat has been updated")
  });
});


app.delete("/cats/:id", (req, res) => { //put(method) page of API to delete data in database 
  const bookId = req.params.id;
  const q = "DELETE FROM cats WHERE id = ?"

  db.query(q,[bookId], (error, data) => {
      if(error) return res.json("Error")
      return res.json("Cat has been deleted")
  })
})

app.listen(8800, () =>{        //App will work on port 8800
    console.log("Backend is running")
})