{% extends "layouts/base.volt" %}

{% block content %}

<div class="container">
    <div class="forms">
            <br><br><br>
            <form action="/reserve/progress" method="post">
                <h2 class="form-header">Price: Rp.{{book.price}}</h2>
                <h3 class="form-header">Confirm Payment</h3>
                <input type="text" name="id" value="{{ bookid }}" hidden>
                <button class="formsbutton" name="action" type="submit" value="yes">Yes</button>
                <button class="deleteformbutton" name="action" type="submit" value="no">No</button>
            </form>
            <br>
    </div>
</div>
{% endblock %}