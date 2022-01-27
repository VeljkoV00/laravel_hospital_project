<html lang="en">

<head>
<base href="/public">
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

                <form action="{{ url('sendemail', $data->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div style="padding: 15px;">

                        <label>Greeting</label>
                        <input type="text" name="greeting" style="color: violet" placeholder="Write the name">


                    </div>


                    <div class="container" style="padding-top: 50px;">



                        <div style="padding: 15px;">

                            <label>Body</label>
                            <input type="text" name="body" style="color: violet" placeholder="Write the number">


                        </div>




                        <div class="container" style="padding-top: 50px;">



                            


                            <div class="container" style="padding-top: 50px;">



                                <div style="padding: 15px;">

                                    <label>Action Text</label>
                                    <input type="text" name="actiontext" style="color: violet"
                                        >
                                </div>

                                <div style="padding: 15px;">

                                    <label>Action Url</label>
                                    <input type="text" name="actionurl" style="color: violet"
                                        >
                                </div>

                                <div style="padding: 15px;">

                                    <label>End part</label>
                                    <input type="text" name="endpart" style="color: violet"
                                        >
                                </div>

                       <div>
                           <input type="submit" class="btn btn-primary">
                       </div>



                              

                            

                </form>


            </div>



        </div>

        @include('admin.script')

</body>

</html>












@include('admin.script')
