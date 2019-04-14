<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tutor;
use App\PembelianCourse;
use App\User;
use App\Course;
use App\TutorSaldoTransaction;
use Illuminate\Support\Facades\DB;


class TutorController extends Controller
{
	public function showCourseSales($courseId)
	{
		$tutor = Tutor::where('id_user', Auth::user()->id)->first();
		$course = Course::whereId($courseId)->first();
		$pembelian_courses = new PembelianCourse;
		$tutor_commission_percentage = 0.6 ;
		if ($course->id_tutor == $tutor->id) {
			$orders = $pembelian_courses->getOrderPerCourse($courseId);
			$totalRevenue = $pembelian_courses->getRevenuePerCourse($courseId , $tutor_commission_percentage);
			//dd($orders);
			return view('layouts/course/tutor/sales-course', ["orders"=>$orders, "course"=>$course, "totalRevenue"=>$totalRevenue]);
		}
		else {
			return route('home');
		}
	}

	public function showTutorSaldoTransaction(){
		$tutor = Tutor::where('id_user', Auth::user()->id)->first();
		$list_tutor_saldo_transaction = TutorSaldoTransaction::where('id_tutor', $tutor->id)->get();
		$data['tutor-saldo'] = $tutor->getTutorSaldo($tutor->id);
		$data['list_tutor_saldo_transaction'] = $list_tutor_saldo_transaction;
		return view('layouts/tutor/saldo-transaction/index', ["data"=>$data]);
	}

	public function createTutorSaldoTransaction(Request $request){


		$tutor_saldo_transaction = new TutorSaldoTransaction;
		$tutor_saldo_transaction->id_tutor = Auth::user()->id;
		$tutor_saldo_transaction->withdraw_amount = $request->withdaw_amount;
		$tutor_saldo_transaction->withdraw_status = 1 ;
		$tutor_saldo_transaction->save();

		return redirect()->route('show-transaction');

	}


	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show()
	{
		$user = Auth::user();
		$tutor = Tutor::where('id_user', $user->id)->first();
		
		return view('layouts/tutor/profile/show-profile', ['tutor' => $tutor, 'user' => $user]);
	}

	public function edit()
	{
		$user = Auth::user();
		$tutor = Tutor::where('id_user', $user->id)->first();
		
		return view('layouts/tutor/profile/edit', ['tutor' => $tutor, 'user' => $user]);
	}

	public function update(Request $request)
	{
		$tutor = new Tutor;
		$tutor->edit($request);
		return redirect()->route('show-tutor');
	}

	public function destroy($id)
	{
		//
	}

	public function showDashboard()
	{
		$user = Auth::user();
		$tutor = Tutor::where('id_user', $user->id)->first();
		// $data['user'] = $user;
		// $data['tutor'] = $tutor;
		$data['tutor-saldo'] = $tutor->getTutorSaldo($tutor->id);
		
		return view('layouts/tutor/dashboard', ['data'=>$data]);
	}
}
