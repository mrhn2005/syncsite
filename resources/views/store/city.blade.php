<select required id="city" name="city_id" class="form-control" style="font-size:90%">
    @foreach($province->cities as $city)
        <option value="{{$city->id}}">
            {{$city->name}}
        </option>
    @endforeach
</select>