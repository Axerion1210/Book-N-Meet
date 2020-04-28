{% extends "layouts/base.volt" %}

{% block content %}

<br><br><br><br>
{% if (books.count() > 0) %}
<!-- <div class="welcome-area" id="welcome"> -->
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
            <tr>
                <th>Room Name</th>
                <th>Room Location</th>
                <th>Reserve Date</th>
                <th>Start Time</th>
                <th>Finish Time</th>
                <th>Price</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            
            <tbody class="table-secondary">
            {% for data in books %}
                {% for room in rooms %}
                    {% if room.id == data.RoomID and userid == data.userID %}
                        <tr>
                            <td>{{room.name}}</td>
                            <td>{{room.location}}</td>
                            <td>{{data.reserveDate}}</td>
                            <td>{{date('H:i', strtotime(data.start_time))}}</td>
                            <td>{{date('H:i', strtotime(data.end_time))}}</td>
                            <td>Rp.{{data.price}}</td>
                            {% if !data.paid %}
                            <td>
                                <form action="/reserve/update" method="post">
                                    <input type="text" name="id" value="{{ data.id }}" hidden>
                                    <button class="updatebutton" type="submit">Update</button>
                                </form>
                            </td>
                            <td>
                                <form action="/reserve/delete" method="post">
                                    <input type="text" name="id" value="{{ data.id }}" hidden>
                                    <button class="deletebutton" type="submit">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="/reserve/payment" method="post">
                                    <input type="text" name="id" value="{{ data.id }}" hidden>
                                    <button class="updatebutton" type="submit">Payment</button>
                                </form>
                            </td>
                            {% else %}
                            <td>
                                <button class="offbutton" type="submit" disabled>Update</button>
                            </td>
                            <td>
                                <button class="offbutton" type="submit" disabled>Delete</button>
                            </td>
                            <td>
                                <button class="offbutton" type="submit" disabled>Completed</button>
                            </td>
                            {% endif %}
                        </tr>
                    {% endif %}
                {% endfor %}
            {% endfor %}
            </tbody>
        </table>
        <br>
    </div>
<!-- </div> -->
{% else %}

{% endif %}
{% endblock %}