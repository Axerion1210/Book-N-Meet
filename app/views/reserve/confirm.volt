{% extends "layouts/base.volt" %}

{% block content %}

<div class="container">
    <div class="forms">
            <br><br><br>
            <form action="/reserve/create" method="post">
                <h1 class="form-header">Confirmation</h1>
                
                <fieldset>
                    <label for="roomName1"><strong>Meeting Room:</strong>  {{room.name}}</label>
                    <label for="dates1"><strong>Reservation Date:</strong> {{dates}}</label>
                    <label for="start_time1"><strong>Start time:</strong> {{start_time}}</label>
                    <label for="end_time1"><strong>Finish time:</strong> {{end_time}}</label>
                    <label for="price1"><strong>Price:</strong> Rp. {{price}}</label>
                </fieldset>
                <input type="text" name="userid" value="{{ userid }}" hidden>
                <input type="text" name="roomid" value="{{ roomid }}" hidden>
                <input type="date" name="dates" value="{{ dates }}" hidden>
                <input type="time" name="start_time" value="{{ start_time }}" hidden>
                <input type="time" name="end_time" value="{{ end_time }}" hidden>
                <input type="text" name="price" value="{{ price }}" hidden>
                <button class="formsbutton" type="submit">Confirm</button>
            </form>
            <br>
    </div>
</div>
{% endblock %}