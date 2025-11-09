<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserPermissionModel;
use App\Models\PermissionModel;
use App\Models\RoleModel;
use App\Models\UserRoleModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $userPermissionModel;
    protected $permissionModel;
    protected $roleModel;
    protected $userRoleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userPermissionModel = new UserPermissionModel();
        $this->permissionModel = new PermissionModel();
        $this->roleModel = new RoleModel();
        $this->userRoleModel = new UserRoleModel();
    }

    public function index() {
        $session = session();
        helper('auth');
        $page_title  = "Quản lý user";
        $users = $this->userModel->findAll();
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/users/list', ['users' => $users]);

        $session->set('uploadDir', FCPATH . 'uploads/products');        
                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    public function createForm()
    {
        $session = session();
        helper('auth');
        $page_title  = "Thêm user";
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/users/create');

        $session->set('uploadDir', FCPATH . 'uploads/products');        
                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    public function editForm($id) {
        $session = session();
        helper('auth');
        $page_title  = "Cập nhật user";
        $user = $this->userModel->find($id);
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/users/edit', ['user' => $user]);

        $session->set('uploadDir', FCPATH . 'uploads/products');        
                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);        
    }

    public function permissions($userId)
    {
        $user = $this->userModel->find($userId);

        // lấy các quyền hiện có của user
        $userPermissions = $this->permissionModel
            ->select('permissions.id, permissions.name')
            ->join('user_permissions', 'user_permissions.permission_id = permissions.id')
            ->where('user_permissions.user_id', $userId)
            ->findAll();

        // lấy tất cả quyền để gán thêm
        $permissions = $this->permissionModel->findAll();

        return view('admin/users/permissions', [
            'user' => $user,
            'userPermissions' => $userPermissions,
            'permissions' => $permissions,
        ]);
    }

    // Thêm user
    public function create()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $this->userModel->insert($data);

        return redirect()->to('/users')->with('message', 'User created successfully!');
    }

    // Sửa user
    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users')->with('message', 'User updated successfully!');
    }

    // Xóa user
    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users')->with('message', 'User deleted successfully!');
    }

    // Cấp quyền cho user
    public function assignPermission($userId)
    {
        $permissionId = $this->request->getPost('permission_id');

        // kiểm tra nếu chưa có thì thêm
        $exists = $this->userPermissionModel
            ->where('user_id', $userId)
            ->where('permission_id', $permissionId)
            ->first();

        if (!$exists) {
            $this->userPermissionModel->insert([
                'user_id'       => $userId,
                'permission_id' => $permissionId,
            ]);
        }

        return redirect()->to('/users//permissions/'.$userId)
            ->with('message', 'Permission assigned successfully!');
    }

    // Xóa quyền của user
    public function removePermission($userId, $permissionId)
    {
        $this->userPermissionModel
            ->where('user_id', $userId)
            ->where('permission_id', $permissionId)
            ->delete();

            return redirect()->to('/users//permissions/'.$userId)
            ->with('message', 'Permission removed successfully!');
    }

    public function roles($userId)
    {
        $user = $this->userModel->find($userId);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User not found");
        }

        // các role hiện có của user
        $userRoles = $this->roleModel
            ->select('roles.id, roles.name, roles.description')
            ->join('user_roles', 'user_roles.role_id = roles.id', 'inner')
            ->where('user_roles.user_id', $userId)
            ->findAll();

        // tất cả roles
        $roles = $this->roleModel->findAll();

        return view('admin/users/roles', [
            'user' => $user,
            'userRoles' => $userRoles,
            'roles' => $roles,
        ]);
    }

    public function assignRole($userId)
    {
        // CodeIgniter\Database\Exceptions\DataException 
        // There is no primary key defined when trying to make insert.
        // Lỗi này rất hay gặp khi làm bảng trung gian trong CI4.
        // vì CI4 Model mặc định yêu cầu có $primaryKey. 
        // Trong bảng trung gian như user_roles hay user_permissions thì bạn không có id làm primary key 
        // mà chỉ có composite key (user_id, role_id).
        // CI4 khi gọi Model::insert() vẫn ép check primaryKey trước khi chạy
        // Vậy nên với bảng không có primary key (như user_roles, user_permissions), dùng Model mặc định của CI4 sẽ luôn gặp lỗi
        // ====> Không dùng Model::insert() cho bảng pivot (bảng trung gian)
        // Bạn nên dùng Query Builder trực tiếp thay vì Model - xem code bên dưới
        $roleId = $this->request->getPost('role_id');

        $exists = $this->userRoleModel
            ->where('user_id', $userId)
            ->where('role_id', $roleId)
            ->first();

        if (!$exists) {
            db_connect()->table('user_roles')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }

        return redirect()->to('/users/roles/' . $userId)
            ->with('message', 'Role assigned successfully!');
    }


    public function removeRole($userId, $roleId)
    {
        $this->userRoleModel
            ->where('user_id', $userId)
            ->where('role_id', $roleId)
            ->delete();

        return redirect()->to('/users/roles/' . $userId)
            ->with('message', 'Role removed successfully!');
    }



}
