{% extends "layouts/base.volt" %}

{% block content %}

<div class="container">
    <div class="forms">
            <br><br><br>
            <form action="/reserve/confirm" method="post">
                <h1 class="form-header">Reservation</h1>
                
                <fieldset>
                    <label for="room">Choose a meeting room:</label>
                    <select id="room" name="room">
                        {% for room in rooms %}
                            <option value='{{room.id}}'>{{room.name}}</option>
                        {% endfor %}
                    </select>

                    <label for="reserveDate">Choose reservation date:</label>
                    <input type="date" id="reserveDate" name="reserveDate"
                        value="{{ date('Y-m-d',time()) }}""
                        min="2020-01-01" max="2030-12-31" required>

                    <label for="start_time">Choose starting time:</label>
                    <input type="time" id="start_time" name="start_time"
                        value="{{ date('H:i',time()) }}"
                        min="07:00" max="20:00" required>

                    <label for="end_time">Choose finish time:</label>
                    <input type="time" id="end_time" name="end_time"
                        value="{{ date('H:i',time()+3600) }}"
                        min="08:00" max="21:00" required>
                </fieldset>
                <button class="formsbutton" type="submit">Submit</button>
            </form>
            <br>
        </div>
</div>
{% endblock %}