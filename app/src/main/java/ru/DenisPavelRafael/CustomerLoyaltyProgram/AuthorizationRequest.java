package ru.DenisPavelRafael.CustomerLoyaltyProgram;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class AuthorizationRequest extends StringRequest {
    private static final String AUTHORIZATION_REQUEST_URL = "https://denpavraf.000webhostapp.com/Login.php";
    private Map<String, String> params;

    public AuthorizationRequest(String login, String password, Response.Listener<String> listener) {
        super(Request.Method.POST, AUTHORIZATION_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("login", login);
        params.put("password", password);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
