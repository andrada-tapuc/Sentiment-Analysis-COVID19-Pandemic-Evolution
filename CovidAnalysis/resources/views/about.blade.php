@extends('layouts.app')

@section('content')
        <div class="container about-wrap row">
            <div class="col-sm-6" style="height: 380px;">
                <img class="about_photo" src="images/about_me.jpg">
            </div>
            <div class="col-sm-6 about-rigth">
                <h4><b>Andrada-Ionela Țăpuc</b> is studying Computational Linguistics at Alexandru Ioan Cuza University, in Iași. She is in love with computer science and likes to learn everything new.</h4>
                <h4>The student activity:</H4>
                <ul>
                    <li>Attendance & certificate of Attendance at the 15th Eurolan School that was held online between 8 th and 12 February 2021.</li>
                    <li>Bodnar Ciprian, Andrada Tapuc, Cosmin Pintilie, Daniela Gı̂fu, Diana Trandabăț (2020) UAIC1860 at SemEval-2022 Task 2: Multilingual and Cross-lingual Word-in-Context Disambiguation. In: Proceedings of the 15th International Workshop on Semantic Evaluation (SemEval-2021), Association for Computational Linguistics, colocated with ACL-IJCNLP 2021, 5-6 August, 2021, Bangkok, Thailand - rank A.</li>
                </ul>
            </div>
        </div>
@endsection
@section('scripts')
    @parent
@endsection
@section('styles')
    @parent
    <style>
        .action-wrap{
            height: 40% !important;
        }
    </style></syle>
@endsection
