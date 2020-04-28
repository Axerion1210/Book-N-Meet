{% extends "layouts/base.volt" %}

{% block content %}

<br><br><br><br>
{% if (rooms.count() > 0) %}
<div class="welcome-area" id="welcome">
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
            <tr>
                <th>Room Name</th>
                <th>Room Location</th>
                <th>Capacity</th>
                <th>Price per Hour</th>
            </tr>
            </thead>
            
            <tbody class="table-secondary">
            {% for room in rooms %}
                <tr>
                    <td>{{room.name}}</td>
                    <td>{{room.location}}</td>
                    <td>{{room.capacity}}</td>
                    <td>{{room.hourPrice}}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
        <br>
        <a href="/reserve" class="main-button-slider">Reserve</a>
    </div>
</div>
{% endif %}
{% endblock %}