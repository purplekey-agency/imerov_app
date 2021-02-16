
<div class="w-100 mb-5">

   <div class="hidden-image">{{$i=1}}</div>

    @foreach($worksheets as $group => $worksheet)

    <div class="card p-4 mt-4 mb-4">

        <p class="h4 mb-0">Day {{ $i ++ }}</p>

        <div class="row col-12 px-0 pt-4 pb-2">
            <div class="col">
                <div class="row col-12 bg-brown mx-0 mb-3">
                    <div class="col-6 p-0">
                        <p class="uppercase m-0"> MUSCLE GROUP <strong>{{$group}}</strong></p>
                    </div>
                </div>
            </div>

            {{-- <div class="col-6">
                <div class="row col-12 bg-brown mx-0 mb-3">
                    <div class="col-8 border-right-black p-0">
                        <p class="uppercase m-0">WEIGHT</p>
                    </div>
                    <div class="col-4">
                        <p class="uppercase m-0">START</p>
                    </div>
                </div>
                <div class="row col-12 bg-brown mx-0 mb-3">
                    <div class="col-4 p-0">
                        <p class="uppercase m-0 box-after">STRECH</p>
                    </div>
                    <div class="col-4 border-right-black p-0">
                        <p class="uppercase m-0 box-after">WARM UP</p>
                    </div>
                    <div class="col-4">
                        <p class="uppercase m-0">FINISH</p>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="p-2 b-top-o b-left-o my-2">
            <div class="">
                <div class="">
                    <p class="uppercase">Worksheet</p>
                </div>
                <div class="uppercase row m-0">
                    <p>muscle: <strong>{{$group}}</strong></p>
                    <p class="underline"></p>
                    {{-- <p>technique:</p>
                    <p class="underline">{},</p>
                    <p>rest:</p>
                    <p class="underline">{},</p>
                    <p>rpe:</p>
                    <p class="underline">{}</p> --}}
                </div>
                <div class="col-12">
                    <table class="col-12">

                        <tr class="row m-0">
                            <th class="col-5">
                                <div class="w-100 h-100 border-bottom-black">
                                </div>
                            </th>
                            <th class="col-1 p-0">
                                <div class="w-100 h-50 ">
                                </div>
                                <div class="w-100 h-50 ">
                                </div>
                            </th>
                            <th class="col-1 p-0 text-center">
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"> set 1</p>
                                </div>
                            </th>
                            <th class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"> set 2</p>
                                </div>
                            </th>
                            <th class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"> set 3</p>
                                </div>
                            </th>
                            <th class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"> set 4</p>
                                </div>
                            </th>
                            <th class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"> set 5</p>
                                </div>
                            </th>
                            <th class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"> set 6</p>
                                </div>
                            </th>
                        </tr>

                        @foreach($worksheet as $exercise_index => $exercise)

                            <tr class="row m-0">
                                <td class="col-5">
                                    <div class="w-100 h-100 border-bottom-black">
                                        <p class="w-100 h-100 m-0">{{$exercise_index + 1}}. Exercise: <strong><a href="{{$exercise->getVideoLink()}}">{{$exercise->getVideoName()}}</strong></p>
                                    </div>
                                </td>
                                <td class="col-1 p-0">
                                    <div class="w-100 h-50 border-black">
                                        <p class="w-100 m-0 text-small">reps</p>
                                    </div>
                                    <div class="w-100 h-50 border-black">
                                        <p class="w-100 m-0 text-small">weight</p>
                                    </div>
                                </td>
                                <td class="col-1 p-0 text-center">
                                    <div class="w-100 h-50 bg-brown">
                                        <p class="w-100 m-0">{{$exercise->reps_1}}</p>
                                    </div>
                                    <div class="w-100 h-50">
                                        <p class="w-100 m-0">{{$exercise->weight_1}}</p>
                                    </div>
                                </td>
                                <td class="col-1 p-0 text-center border-left-black">
                                    <div class="w-100 h-50 bg-brown">
                                        <p class="w-100 m-0">{{$exercise->reps_2}}</p>
                                    </div>
                                    <div class="w-100 h-50">
                                        <p class="w-100 m-0">{{$exercise->weight_2}}</p>
                                    </div>
                                </td>
                                <td class="col-1 p-0 text-center border-left-black">
                                    <div class="w-100 h-50 bg-brown">
                                        <p class="w-100 m-0">{{$exercise->reps_3}}</p>
                                    </div>
                                    <div class="w-100 h-50">
                                        <p class="w-100 m-0">{{$exercise->weight_3}}</p>
                                    </div>
                                </td>
                                <td class="col-1 p-0 text-center border-left-black">
                                    <div class="w-100 h-50 bg-brown">
                                        <p class="w-100 m-0">{{$exercise->reps_4}}</p>
                                    </div>
                                    <div class="w-100 h-50">
                                        <p class="w-100 m-0">{{$exercise->weight_4}}</p>
                                    </div>
                                </td>
                                <td class="col-1 p-0 text-center border-left-black">
                                    <div class="w-100 h-50 bg-brown">
                                        <p class="w-100 m-0">{{$exercise->reps_5}}</p>
                                    </div>
                                    <div class="w-100 h-50">
                                        <p class="w-100 m-0">{{$exercise->weight_5}}</p>
                                    </div>
                                </td>
                                <td class="col-1 p-0 text-center border-left-black">
                                    <div class="w-100 h-50 bg-brown">
                                        <p class="w-100 m-0">{{$exercise->reps_6}}</p>
                                    </div>
                                    <div class="w-100 h-50">
                                        <p class="w-100 m-0">{{$exercise->weight_6}}</p>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        {{-- <tr class="row m-0">
                            <td class="col-5">
                                <div class="w-100 h-100 border-bottom-black">
                                    <p class="w-100 h-100 m-0 text-large">2.</p>
                                </div>
                            </td>
                            <td class="col-1 p-0">
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">reps</p>
                                </div>
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">weight</p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                        </tr> --}}
                        {{-- <tr class="row m-0">
                            <td class="col-5">
                                <div class="w-100 h-100 border-bottom-black">
                                    <p class="w-100 h-100 m-0 text-large">3.</p>
                                </div>
                            </td>
                            <td class="col-1 p-0">
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">reps</p>
                                </div>
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">weight</p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                        </tr> --}}
                        {{-- <tr class="row m-0">
                            <td class="col-5">
                                <div class="w-100 h-100 border-bottom-black">
                                    <p class="w-100 h-100 m-0 text-large">4.</p>
                                </div>
                            </td>
                            <td class="col-1 p-0">
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">reps</p>
                                </div>
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">weight</p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                        </tr> --}}
                        {{-- <tr class="row m-0">
                            <td class="col-5">
                                <div class="w-100 h-100 border-bottom-black">
                                    <p class="w-100 h-100 m-0 text-large">5.</p>
                                </div>
                            </td>
                            <td class="col-1 p-0">
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">reps</p>
                                </div>
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">weight</p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                        </tr> --}}
                        {{-- <tr class="row m-0">
                            <td class="col-5">
                                <div class="w-100 h-100 border-bottom-black">
                                    <p class="w-100 h-100 m-0 text-large">6.</p>
                                </div>
                            </td>
                            <td class="col-1 p-0">
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">reps</p>
                                </div>
                                <div class="w-100 h-50 border-black">
                                    <p class="w-100 m-0 text-small">weight</p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                            <td class="col-1 p-0 text-center border-left-black">
                                <div class="w-100 h-50 bg-brown">
                                    <p class="w-100 m-0"></p>
                                </div>
                                <div class="w-100 h-50">
                                    <p class="w-100 m-0"></p>
                                </div>
                            </td>
                        </tr> --}}
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="row col-12 p-2">

            <div class="col-6 p-0">
                <div class="row w-100 m-0">
                    <p class="w-100 h-100 m-0">cardio</p>
                </div>
                <div class="row w-100 m-0">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Time</th>
                            <th>Intensity/Speed</th>
                            <th>Cal. burned</th>
                        </tr>
                        <tr>
                            <td>{}</td>
                            <td>{}</td>
                            <td>{}</td>
                            <td>{}</td>
                        </tr>
                        <tr>
                            <td>{}</td>
                            <td>{}</td>
                            <td>{}</td>
                            <td>{}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col col-6">
                <div class="w-100 border-bottom-black">
                    <p class="w-100 h-100 m-0">notes/nutrition</p>
                </div>
                <div class="w-100 border-bottom-black">
                    <p class="w-100 m-0">{}</p>
                </div>
                <div class="w-100 border-bottom-black">
                    <p class="w-100 m-0">{}</p>
                </div>
                <div class="w-100 border-bottom-black">
                    <p class="w-100 m-0">{}</p>
                </div>
                <div class="w-100 border-bottom-black">
                    <p class="w-100 m-0">{}</p>
                </div>
            </div>

        </div> --}}

    </div>

    @endforeach

</div>

<div class="col-4 md-offset-2">
    <p class="m-0 mb-2 text-center">Messages</p>

    @if($exercise_messages->count() > 0)
        @foreach($exercise_messages as $message)
            <div class="card p-2 m-1 message-card @if($message->fromAdmin()) admin @endif">
                <p class="message-user">{!!$message->getUserName()!!}:</p>
                {!!$message->message!!} <br>
                <p class="message-date">{!!$message->getDate()!!}</p>
            </div>
        @endforeach
    @endif

    <div class="send-message-container">
        <form method="POST" class="send-message" action="{{route('sendExerciseMessage')}}">
            @csrf
            <textarea class="form-control m-1" required minlength="10" minlength="200" name="message_body"></textarea>
            <button class="btn btn-light w-25 mr-0 ml-auto" type="submit">Send</button>
        </form>
    </div>
</div>