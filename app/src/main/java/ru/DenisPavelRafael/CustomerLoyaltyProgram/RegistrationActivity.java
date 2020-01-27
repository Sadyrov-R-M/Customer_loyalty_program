package ru.DenisPavelRafael.CustomerLoyaltyProgram;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;
import org.json.JSONException;
import org.json.JSONObject;

public class RegistrationActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registration);

        final EditText editTextSurname = (EditText) findViewById(R.id.editTextSurname);
        final EditText editTextName = (EditText) findViewById(R.id.editTextName);
        final EditText editTextPatronymic = (EditText) findViewById(R.id.editTextPatronymic);
        final EditText editTextLogin = (EditText) findViewById(R.id.editTextLogin);
        final EditText editTextPassword = (EditText) findViewById(R.id.editTextPassword);
        final Button buttonToRegister = (Button) findViewById(R.id.buttonToRegister);

        buttonToRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String surname = editTextSurname.getText().toString();
                final String name = editTextName.getText().toString();
                final String patronymic = editTextPatronymic.getText().toString();
                final String login = editTextLogin.getText().toString();
                final String password = editTextPassword.getText().toString();

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            boolean success = jsonObject.getBoolean("success");

                            if (success){
                                Intent intent = new Intent(RegistrationActivity.this, AuthorizationActivity.class);
                                RegistrationActivity.this.startActivity(intent);

                            } else {
                                AlertDialog.Builder builder = new AlertDialog.Builder(RegistrationActivity.this);
                                builder.setMessage("Не удалось зарегистрироваться")
                                        .setNegativeButton("Попробовать снова", null)
                                        .create()
                                        .show();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                };

                RegistrationRequest registrationRequest = new RegistrationRequest(surname, name, patronymic, login, password, responseListener);
                RequestQueue queue = Volley.newRequestQueue(RegistrationActivity.this);
                queue.add(registrationRequest);
            }
        });
    }
}
