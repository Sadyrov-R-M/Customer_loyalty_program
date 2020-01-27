package ru.DenisPavelRafael.CustomerLoyaltyProgram;

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import java.util.HashMap;
import java.util.Map;

public class RegistrationRequest extends StringRequest {

    private static final String REGISTER_REQUEST_URL = "https://denpavraf.000webhostapp.com/Register.php";
    private Map<String, String> params;

    public RegistrationRequest(String surname, String name, String patronymic, String login, String password, Response.Listener<String> listener) {
        super(Method.POST, REGISTER_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("surname", surname);
        params.put("name", name);
        params.put("patronymic", patronymic);
        params.put("login", login);
        params.put("password", password);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}