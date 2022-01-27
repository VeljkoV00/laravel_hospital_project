<html lang="en">

<head>

    @include('admin.css')
    <style type="text/css">
        label {

            display: inline-block;
            width: 200px;
        }

    </style>


</head>

<body>

    <div class="container-scroller">
        @include('admin.sidebar')


        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">



            <div class="container" style="padding-top: 50px;">



                @if (session()->has('message'))

                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert">x</button>

                        {{ session()->get('message') }}

                    </div>


                @endif

                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div style="padding: 15px;">

                        <label>Doctor Name</label>
                        <input type="text" name="name" style="color: violet" placeholder="Write the name">


                    </div>


                    <div class="container" style="padding-top: 50px;">



                        <div style="padding: 15px;">

                            <label>Phone Number</label>
                            <input type="number" name="number" style="color: violet" placeholder="Write the number">


                        </div>




                        <div class="container" style="padding-top: 50px;">



                            <div style="padding: 15px;">

                                <label>Speciality</label>

                                <select name="spec">
                                    <option value="skin">Skin Doctor</option>
                                    <option value="dentist">Dentist</option>
                                    <option value="ped">Pediatrist</option>


                                </select>



                            </div>



                            <div class="container" style="padding-top: 50px;">



                                <div style="padding: 15px;">

                                    <label>Room Number</label>
                                    <input type="number" name="room" style="color: violet"
                                        placeholder="Write the number">





                                </div>





                                <div style="padding: 15px">
                                    <label>Doctor Image</label>
                                    <input type="file" name="file">




                                </div>


                            </div div style="padding: 15px">
                            <label>Doctor Image</label>
                            <input type="submit" class="btn btn-success">




                        </div>


                </form>


            </div>



        </div>

        @include('admin.script')

</body>

</html>












@include('admin.script')
