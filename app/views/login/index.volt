{% extends "layouts/base.volt" %}

{% block content %}

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome"> 
        <!-- ***** Header Text Start ***** -->
        <!-- <div class="header-text"> -->
            <div class="forms">
                <!-- <div class="row"> -->
                    <br><br><br><br>
                        <form action="" method="post">
      
                                <h1 class="form-header">Login</h1>
                                
                                <fieldset>
                                  <label for="email">Email:</label>
                                  <input type="email" id="mail" name="email">
                                  
                                  <label for="pass">Password:</label>
                                  <input type="password" id="password" name="pass">
                                </fieldset>
                            <button class="formsbutton" type="submit">Login</button>
                        </form>
                <!-- </div> -->
            </div>
        <!-- </div> -->
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

{% endblock %}