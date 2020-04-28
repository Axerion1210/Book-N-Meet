{% extends "layouts/base.volt" %}

{% block content %}

<div class="container">
    <div class="forms">
            <br><br><br>
            <form action="/reserve/updating" method="post">
                <h1 class="form-header">Update</h1>
                
                <fieldset>
                    <label for="roomName1"><strong>Meeting Room:</strong> {{room.name}}</label>
                    <label for="dates1"><strong>Reservation Date:</strong></label>
                    <input type="date" id="dates" name="dates"
                        value="{{book.reserveDate}}"
                        min="2020-01-01" max="2030-12-31" required>
                    <label for="start_time1"><strong>Start time:</strong></label>
                    <input type="time" id="start_time" name="start_time"
                        value="{{date('H:i', strtotime(book.start_time))}}"
                        min="07:00" max="20:00" required>
                    <label for="end_time1"><strong>Finish time:</strong></label>
                    <input type="time" id="end_time" name="end_time"
                        value="{{date('H:i', strtotime(book.end_time))}}"
                        min="08:00" max="21:00" required>
                    <input type="text" name="id" value="{{ book.id }}" hidden>
                </fieldset>
                <button class="formsbutton" type="submit">Update</button>
            </form>
            <br>
    </div>
</div>
{% endblock %}