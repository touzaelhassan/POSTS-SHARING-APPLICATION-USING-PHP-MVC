-----| MVC

       MVC : Model - View - Controller
       -------------------------------

       Software Architectural Design Pattern That allows us to seperate The business logic of The application
       from user interfaces ( UI )

           1 - MODEL

               + used to deal with The data of The application
               + Interacts with The database ( INSERT - SELECT - UPDATE - DELETE )
               + Communicate with The Controller

           2 - VIEW

               + What The user sees in The browser (UI) usually consists of HTML and CSS
               + Communicate with The Controller
               + Can be passed dynamic values from The Controller

           3 - CONTROLLER
               + Handles comming request from The client and tells The model and view what To do based on This request
               + Receives input from The URL and Forms and processes requests ( GET - POST )
               + Gets data from The Model
               + Passes data To The view

       MVC WORKFLOW
       ------------

        1 - The URL = http://yourapp.com/users/profile/1

        2 -The Rout = users/profile/:id = Users.getProfile(id)

        3 - controllers
            class Users{
            function getProfile(id){
            profile = this.UserModel.getProfile(id)
            renderView('users/profile', profile)
            }

        4 - models
            Class UserModel{
            function getProfile(id){
            data = this.db.get('SELECT * FROM users WHERE id = id')
            return data;
            }

        5 - views
             /users
              /profile
                <h1>{{profile.name}}</h1>
                <ul>
                <li>Email: {{profile.email}}</li>
                <li>Phone: {{profile.phone}}</li>
                </ul>
