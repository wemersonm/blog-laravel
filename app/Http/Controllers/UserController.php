<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest2')->only('create', 'store');
     
       
    }


    public function teste(Request $request)
    {

        $data = DB::table('Post')
            ->select(["Post.Title", "Post.IdUser", "Post.IdPost"])
            ->selectSub(function ($query) {
                $query->selectRaw("STRING_AGG(Tag.NameTag, ',')")
                    ->from("TagPost")
                    ->join("Tag", "Tag.IdTag", "=", "TagPost.IdTag")
                    ->whereColumn("TagPost.IdPost", "Post.IdPost");
            }, "Tags")
            ->get();


        $data = DB::table('Post')
            ->rightJoin('User', 'Post.IdUser', '=', 'User.IdUser')
            /*   ->join("Category", 'Category.IdCategory', '=', 'Post.IdCategory')
            ->where("Post.IdUser", '=', function ($query) {
                $query->select("IdUser")->from("User")->where("Username", 'wems');
            }) */
            ->get();

        $data = DB::table('Tag')
            ->join('TagPost', function ($join) {
                $join->on('Tag.IdTag', '=', 'TagPost.IdTag')
                    ->where('IdPost', '=', 32);
            })
            ->get();

        // query conditional
        $name = $request->name;
        $data = DB::table('User')
            ->when(!empty($name), function ($query) use ($name) {
                $query->where("UserFullName", 'like', '%' . $name . '%');
            })
            ->select("UserFullName")
            ->get();


        // paginação
        $total = DB::table('User')->count();
        $qtdPerPage = 5;
        $qtdPage = ceil($total / $qtdPerPage);
        $offset  = 0;
        $limit = $request->limit;
        $data = DB::table('User')
            ->skip($limit)
            ->take($qtdPerPage)
            ->get();

        for ($i = 1; $i <= $qtdPage; $i++) {
            echo '<a href="' . route('join.teste', ['limit' => $offset]) . '"> [' . $i . ']</a> ';
            $offset += $qtdPerPage;
        }


        dd($data);
    }
    public function index(Request $request)
    {
        /*     // get all 
        $users = DB::table('User')->get();
        $users = User::all();

        // $users = User::find(1008);

        // get One
        $users = User::find(1008);
        $users = DB::table('User')->where('IdUser', 1008)->first();
        $users = User::where('IdUser', 1008)->get();

        // functs
        $users = DB::table('User')
            // ->oldest('CreatedAt')
            ->latest('CreatedAt')
            ->get();

        $users = DB::table('User')
            ->orderBy('Username', 'desc')
            ->get();

        $users = DB::table('User')
            ->inRandomOrder()
            ->first();

        $users = DB::table('User')->select(['IdUser', 'Username'])->get();

        $users =  DB::table('User')
            ->orderBy('IdUser', 'desc')
            ->limit(5)
            ->get();

        $users =  DB::table('User')
            // ->skip(2)
            ->offset(4)
            ->get();

        //where
        $users = DB::table('User')
            // ->where("Username","like","w%")
            ->where(
                [
                    ["IdUser", ">", 1010],
                    ["UserFullName", "like", "%w%"],
                ]
            )
            ->orWhere("IdUser", ">", 1000)
            ->get();


        $users = DB::table('User')
            // ->where("Username","like","w%")
            ->where("IdUser", 1533)
            ->exists();

        //subquery
        $users = DB::table('Post')
            ->where("IdUser", '=', function ($query) {
                $query
                    ->select("IdUser")
                    ->from("User")
                    ->where('Username', 'wems');
            })
            ->get();

        // between
        $users = DB::table('User')
            // ->whereNotBetween('CreatedAt', ['2023-10-25', '2023-10-29'])
            // ->orWhereBetween('CreatedAt', ['2023-10-25', '2023-10-29'])

            ->whereBetween('CreatedAt', ['2023-10-25', '2023-10-29'])
            ->get();


        // in
        $users = DB::table('User')
            // ->whereNotIn('IdUser', [1008, 1020])
            ->whereIn('IdUser', [1008, 1020])
            ->get();

        $users = DB::table('User')
            ->whereNull('Email')
            ->get();

        //date
        $users = DB::table('User')
            ->orWhereDate('CreatedAt', '>', '2023-10-25')
            ->orWhereDay('CreatedAt', '>', '17')
            ->orWhereMonth("CreatedAt", ">", '05')
            ->orWhereYear("CreatedAt", ">", "2022")
            ->orWhereTime('CreatedAt', '>', '14:00:00')
            ->get();

        // compare column
        $users = DB::table('User')
            ->whereColumn('CreatedAt', '!=', 'UpdatedAt')
            ->get();


        //increment 
        $data = DB::table('User')
            ->increment("UserRate",-10);
 */

        $users = DB::table('User')
            ->paginate(4);
        return view('user.index', compact('users'));
    }
    public function show(User $user)
    {
        return $user;
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $all = ($request->except('_token'));
        $validations = $request->validate([
            'Username' => 'required|string|max:13',
            'UserFullName' => 'required|string|max:30',
            'UserBio' => 'max:200',
            'Email' => 'required|email',
            'Password' => 'required',
            'UserImage' => 'file'
        ], $all);

        $validations['Password'] = bcrypt($validations['Password'], [PASSWORD_DEFAULT]);

        $inserted = DB::table('User')->insertGetId(
            $validations
        );

        $lastInsert = DB::table('User')->where("IdUser", $inserted)->first();
        dd($lastInsert ?? "Deu erro ao inserir");
    }

    public function update($id)
    {
        $updated = DB::table('User')
            ->where("IdUser", $id)
            ->update([
                "UserFullName" => "Wemerson3",
            ]);

        dd($updated ?? "Deu ruim");
    }

    public function destroy($id)
    {
        $deleted = DB::table('User')
            ->where("IdUser", $id)
            ->delete();

        dd($deleted == 1 ? "Deletado !" : "Erro ao deletar o usuario $id");
    }
}
