<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = DB::table('usuarios')->orderBy('name', 'asc')->paginate(100);
        if ($usuarios) {
            return view('usuarios.index', compact('usuarios'));
        } else {
            return redirect()->route('/')->with('error', 'Erro ao retornar usuários!');
        }
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validaton = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('usuarios','email')]
        ]);

        if ($validaton->fails()) {
            return redirect('usuarios.create')->with('error', 'Erro ao cadastrar usuário!')->withInput();
        }

        if (Usuario::create($request->all())){
            return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
        }
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            return view('usuarios.show')->with('usuario', $usuario);
        } else {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        }
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            return view('usuarios.edit')->with('usuario', $usuario);
        } else {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $rules = array(
                'name' => 'required',
                'email' => 'required|email'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('usuarios/' . $id . '/edit')->with('error', 'Erro ao atualizar usuário!')->withInput();
            } else {
                $usuario->name = $request->input('name');
                $usuario->email = $request->input('email');
                $usuario->save();
                return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
            }
        } else {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        }
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado!');
        }
    }
}