<html>
    <head>
        <title>FaceBook | Sign Up</title>
    </head>

    <style>
        #bar{
            height:100px;
            background-color: rgb(59, 89, 152);
            color: #d9dfeb;
            display: flex;
            /*justify-content: space-between;*/
            align-items: flex-end;
            padding: 0 10px;
        }

        #facebook_name{
            font-size: 35px;
            margin-bottom: 10px;
            transform: scale(1, 1.2)
        }

        #signup_button{
            font-size:20px;
            background-color: #42b72a;
            width:90px;
            text-align:center;
            padding:4px;
            border-radius:4px;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        #centre_page{
            background-color: white;
            width: 700px;
            height: 375px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            padding-top: 75px;
            text-align: center;
        }

        #text{
            width: 300px;
            height: 35px;
            border-radius: 4px;
            border: solid 1px #ccc;
            padding: 4px;
            font-size: 14px;
        }

        #button{
            width: 300px;
            height: 35px;
            border-radius: 4px;
            font-weight: bold;
            color: #d9dfeb;
            background-color: rgb(59, 89, 152);
            border: none;
        }

    </style>

    <body style="font-family: tahoma; background-color:#e9ebee;">
        <div id="bar">
            <div id="facebook_name"><b>facebook</b></div>
            <div id="signup_button">Sign Up</div>
        </div>

        <div id="centre_page">
            <p>Sign up to Facebook</p>
            <input type="text" id="text" style="margin-top:10px;" placeholder="First Name"><br>
            <input type="text" id="text" style="margin-top:10px;" placeholder="Last Name"><br>

            <select id="text" style="margin-top:10px;">
                <option>Male</option>
                <option>Female</option>
                <option>Attack helicopter</option>
            </select>
            <br>
            <input type="text" id="text" style="margin-top:10px;" placeholder="Email address or phone number"><br>

            <input type="password" id="text" style="margin-top:8px;" placeholder="Password"><br>
            <input type="password" id="text" style="margin-top:8px;" placeholder="Enter password again"><br>

            <input type="submit" id="button" value="Sign Up" style="margin-top:8px;">
        </div>
    </body>

</html>