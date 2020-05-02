
<div class="card-body">

    <div class="card-body">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <div class="card-body">

    <div class="form-group">
        @csrf

        @php

        $input = "title";

        @endphp

        <label for="{{$input}}">Title</label>

        <input type="text" name="{{$input}}" value="{{  old($input)!==null  ? old($input) :  $mail->{$input} }}"
            class="form-control @error($input) is-invalid @enderror" id="{{$input}}" placeholder="Enter Title">

        @error($input)
        <p class="invalid-feedback">{{$message}}</p>
        @enderror

    </div>


    <div class="row">
        <div class="col-12">
            <!-- textarea -->
            <div class="form-group">

                @php

                $input = "content";

                @endphp

                <label for="{{$input}}">Content</label>

                <textarea id="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                    name="{{$input}}" rows="3"
                    placeholder="Enter Description">{{ old($input)!==null  ? old($input) :  $mail->{$input} }}</textarea>

                @error($input)
                <p class="invalid-feedback">{{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    {{-- hide the status select in the create page , number 2 for the check the segment 2 is create or not --}}
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Chose a newsletter :</label>
                <div></div>
                <select class="custom-select form-control " name="newsletter_id">

                  @foreach($newsletters as $newsletter)
                        <option  {{$mail->newsletter_id==$newsletter->id?'selected' :'' }}value="{{$newsletter->id}}">{{$newsletter->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</div>
