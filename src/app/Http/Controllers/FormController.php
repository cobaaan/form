<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Contact;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\CategoryRequest;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class FormController extends Controller
{
    public $showModal = false;
    
    public function contact(){
        $contacts = Contact::all();
        $categories = Category::all();
        return view('contact', compact('contacts', 'categories'));
    }
    
    public function confirm(ContactRequest $request){
        $requests = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'tell2', 'tell3', 'address', 'address2', 'category_id', 'detail']);
        return view('confirm', compact('requests'));
    }
    
    public function thanks(Request $request){
        $requests = $request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        Contact::create($requests);
        return view('thanks');
    }
    
    public function admin(){
        $contacts = Contact::Paginate(7);
        //$contacts = Contact::all();
        $categories = Category::all();
        $showModal = null;
        return view('admin', compact('contacts', 'categories', 'showModal'));
    }
    
    public function modal(Request $request){
        $showModal = 'nu';
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        $requests = $request->all();
        unset($requests['_token']);
        return view('admin', compact('requests', 'contacts', 'categories', 'showModal'));
    }
    
    public function adminSearch(Request $request){
        $contacts = Contact::AllSearch($request)->get()->paginate(7);
        
        $categories = Category::all();
        $showModal = null;
        $requests = $request->all();
        
        return view('admin', compact('requests','contacts', 'categories', 'showModal'));
    }
    
    public function postCSV() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // ヘッダー行の追加
        $sheet->setCellValue('A1', 'カテゴリID');
        $sheet->setCellValue('B1', '名');
        $sheet->setCellValue('C1', '姓');
        $sheet->setCellValue('D1', '性別');
        $sheet->setCellValue('E1', 'メールアドレス');
        $sheet->setCellValue('F1', '電話番号');
        $sheet->setCellValue('G1', '住所');
        $sheet->setCellValue('H1', '建物名');
        $sheet->setCellValue('I1', '詳細');
        $sheet->setCellValue('J1', '作成日時');
        $sheet->setCellValue('K1', '更新日時');
        
        // データ行の追加
        $users = Contact::all();
        $rowNumber = 2;
        foreach ($users as $user) {
            $sheet->setCellValueExplicit('A' . $rowNumber, $user->category_id, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('B' . $rowNumber, $user->first_name);
            $sheet->setCellValue('C' . $rowNumber, $user->last_name);
            $sheet->setCellValueExplicit('D' . $rowNumber, $user->gender, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('E' . $rowNumber, $user->email);
            $sheet->setCellValueExplicit('F' . $rowNumber, $user->tell, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('G' . $rowNumber, $user->address);
            $sheet->setCellValue('H' . $rowNumber, $user->building);
            $sheet->setCellValue('I' . $rowNumber, $user->detail);
            $sheet->setCellValueExplicit('J' . $rowNumber, $user->created_at, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('K' . $rowNumber, $user->updated_at, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $rowNumber++;
        }
        
        // CSVファイルとして保存
        $writer = new Csv($spreadsheet);
        $fileName = 'users.csv';
        $writer->save($fileName);
        
        // ダウンロード用のリンクを生成
        return response()->download($fileName)->deleteFileAfterSend(true);
        
        $categories = Category::all();
        $showModal = null;
        $requests = $request->all();
        
        return view('admin', compact('requests','contacts', 'categories', 'showModal'));
    }
    
    public function adminDelete(Request $request){
        $showModal = null;
        $categories = Category::all();
        $contacts = Contact::Paginate(7);
        Contact::find($request->id)->delete();
        return view('admin', compact('contacts', 'categories', 'showModal'));
    }
    
    public function register(){
        return view('auth.register');
    }
    
    public function login(){
        return view('auth.login');
    }
}
