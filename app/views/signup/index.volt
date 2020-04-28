{% extends "layouts/base.volt" %}

{% block content %}

    <!-- ***** Welcome Area Start ***** -->
    <!-- <div class="welcome-area" id="welcome">  -->
        <!-- ***** Header Text Start ***** -->
        <!-- <div class="header-text"> -->
            <div class="forms">
                <!-- <div class="row"> -->
                    <br><br><br>
                        <form action="/signup/register" method="post">
      
                                <h1 class="form-header">Sign Up</h1>
                                
                                <fieldset>
                                    <label for="firstName">First Name:</label>
                                    <input type="text" id="name" name="firstName">

                                    <label for="lastName">Last Name:</label>
                                    <input type="text" id="name" name="lastName">

                                    <label for="email">Email:</label>
                                    <input type="email" id="mail" name="email">
                                    
                                    <label for="pass">Password:</label>
                                    <input type="password" id="password" name="pass">

                                    <label for="confirm">Password:</label>
                                    <input type="password" id="password" name="confirm">

                                    <label for="country">Country:</label>
                                    <input type="text" id="name" name="country">

                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="name" name="phone">
                                </fieldset>
                            <button class="formsbutton" type="submit">Sign Up</button>
                        </form>
                        <br>
                <!-- </div> -->
            </div>
        <!-- </div> -->
        <!-- ***** Header Text End ***** -->
    <!-- </div> -->
    <!-- ***** Welcome Area End ***** -->

{% endblock %}