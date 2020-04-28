{% extends "layouts/base.volt" %}

{% block content %}

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">
        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row"> 
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>Book'N'Meet</h1>
                        <p>Website for your meeting room reservation.</p>
                        {% if session.has("auth_id") %}
                            <a href="/rooms" class="main-button-slider">Start Reserve</a>
                        {% else %}
                            <a href="/signup" class="main-button-slider">Sign Up</a>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

{% endblock %}