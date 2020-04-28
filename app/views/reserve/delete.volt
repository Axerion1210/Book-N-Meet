{% extends "layouts/base.volt" %}

{% block content %}

<div class="container">
    <div class="forms">
            <br><br><br>
            <form action="/reserve/deleting" method="post">
                <h2 class="form-header">Are you sure?</h2>
                <input type="text" name="bookid" value="{{ bookid }}" hidden>
                <button class="formsbutton" name="action" type="submit" value="yes">Yes</button>
                <button class="deleteformbutton" name="action" type="submit" value="no">No</button>
            </form>
            <br>
    </div>
</div>
{% endblock %}