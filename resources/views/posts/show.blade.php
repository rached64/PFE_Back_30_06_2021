  
 


<div class="container-fluid px-4">
                        <h1 class="mt-4">Question</h1>
                        
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>title</th>
                                       
                                        </tr>
                                    </thead>
                               
                                    <tbody>
                                    @foreach($post as $posts)
                                        <tr>
                                    
                                            <td>{{$posts->title}}</td>
                                         
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

              