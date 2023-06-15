<form action="{{route('data')}}" method="POST">
    @csrf

<label for="type">CRIM:</label>
<input type="text" name="CRIM" ><br>
<label for="incident_date">ZN:</label>
<input type="text" name="ZN" ><br>
<label for="incident_date">INDUS:</label>
<input type="text" name="INDUS" ><br>
<label for="incident_date">CHAN:</label>
<input type="text" name="CHAN" ><br>
<label for="incident_date">NOX:</label>
<input type="text" name="NOX" ><br>
<label for="incident_date">RM:</label>
<input type="text" name="RM" ><br>
<label for="incident_date">AGE:</label>
<input type="text" name="AGE" ><br>
<label for="incident_date">DIS:</label>
<input type="text" name="DIS" ><br>
<label for="incident_date">RAD:</label>
<input type="text" name="RAD" ><br>
<label for="incident_date">TAX:</label>
<input type="text" name="TAX" ><br>
<label for="incident_date">PTRATIO:</label>
<input type="text" name="PTRATIO" ><br>
<label for="incident_date">B:</label>
<input type="text" name="B" ><br>
<label for="incident_date">LSTAT:</label>
<input type="text" name="LSTAT" ><br>

<button type="submit">PREDICTION</button>
</form>