package com.nhau.gadget;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.util.Log;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.entity.BufferedHttpEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.ByteArrayBuffer;

import java.io.BufferedInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;

/**
 * Created by root on 8/24/15.
 */
public class Http {
    private InputStream OpenHttpConnection(String urlString)
            throws IOException {
        InputStream in = null;
        int response = -1;
        URL url = new URL(urlString);
        URLConnection conn = url.openConnection();
        if (!(conn instanceof HttpURLConnection))
            throw new IOException("Not an HTTP connection");
        try {
            HttpURLConnection httpConn = (HttpURLConnection) conn;
            httpConn.setAllowUserInteraction(false);
            httpConn.setInstanceFollowRedirects(true);
            httpConn.setRequestMethod("GET");
            httpConn.connect();
            response = httpConn.getResponseCode();
            if (response == HttpURLConnection.HTTP_OK) {
                in = httpConn.getInputStream();
            } else {
                in = null;
            }
        } catch (Exception ex) {
            throw new IOException("Error connecting");
        }
        return in;
    }

    public String DownloadText(String URL) {
        int BUFFER_SIZE = 2000;
        InputStream in = null;
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            //Toast.makeText(this, e1.getLocalizedMessage(),Toast.LENGTH_LONG).show();
            e1.printStackTrace();
            return "";
        }
        InputStreamReader isr = new InputStreamReader(in);
        int charRead;
        String str = "";
        char[] inputBuffer = new char[BUFFER_SIZE];
        try {
            while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                String readString =
                        String.copyValueOf(inputBuffer, 0, charRead);
                str += readString;
                inputBuffer = new char[BUFFER_SIZE];
            }
            in.close();
        } catch (IOException e) {
            //Toast.makeText(this, e.getLocalizedMessage(),Toast.LENGTH_LONG).show();
            e.printStackTrace();
            return "";
        }
        return str;
    }

    public String getTitles(String category) {
        //String URL="http://50.3.230.3/~pamumang/index.php/site/titles";
        Misc misc=new Misc();
        String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/product/details";
        int BUFFER_SIZE = 2000;
        String str = "";
        InputStream in = null;
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            e1.printStackTrace();
            return "";
        }
        if (in != null) {
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;

            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                    String readString =
                            String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                e.printStackTrace();
                return "";
            }
        } else {
            str = "NO_CONNECTION";

        }
        return str;
    }

    public String getBlog(String id) {
        Misc misc=new Misc();
        String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/product/get/id/" + id;
        int BUFFER_SIZE = 2000;
        InputStream in = null;
        String str = "";
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            //Toast.makeText(this, e1.getLocalizedMessage(),Toast.LENGTH_LONG).show();
            e1.printStackTrace();
            return "";
        }
        if (in != null) {
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;

            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                    String readString =
                            String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                //Toast.makeText(this, e.getLocalizedMessage(),Toast.LENGTH_LONG).show();
                e.printStackTrace();
                return "";
            }
        } else {
            str = "NO_CONNECTION";
        }
        return str;
    }

    public String getJob(String id) {
        Misc misc=new Misc();
        String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/stock/get/id/" + id;
        int BUFFER_SIZE = 2000;
        InputStream in = null;
        String str = "";
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            e1.printStackTrace();
            return "";
        }
        if (in != null) {
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;

            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                    String readString =
                            String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                //Toast.makeText(this, e.getLocalizedMessage(),Toast.LENGTH_LONG).show();
                e.printStackTrace();
                return "";
            }
        } else {
            str = "NO_CONNECTION";
        }
        return str;
    }

    public String getCategory(String category) {
        Misc misc=new Misc();
        String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/news/index.php/site/category/id/" + category;
        int BUFFER_SIZE = 2000;
        InputStream in = null;
        String str = "";
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            //Toast.makeText(this, e1.getLocalizedMessage(),Toast.LENGTH_LONG).show();
            e1.printStackTrace();
            return "";
        }
        if (in != null) {
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;

            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                    String readString =
                            String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                //Toast.makeText(this, e.getLocalizedMessage(),Toast.LENGTH_LONG).show();
                e.printStackTrace();
                return "";
            }
        } else {
            str = "NO_CONNECTION";
        }
        return str;
    }

    public Bitmap DownloadImage(String URL) {
        // TODO Auto-generated method stub
        //String urlStr = params[0];
        Bitmap img = null;

        HttpClient client = new DefaultHttpClient();
        HttpGet request = new HttpGet(URL);
        HttpResponse response;
        try {
            response = (HttpResponse) client.execute(request);
            HttpEntity entity = response.getEntity();
            BufferedHttpEntity bufferedEntity = new BufferedHttpEntity(entity);
            InputStream inputStream = bufferedEntity.getContent();
            img = BitmapFactory.decodeStream(inputStream);
        } catch (ClientProtocolException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        return img;
    }

    public String setSupport(String text, String num) {
        String str="";
        try {
            //text=text.replace(" ","-");
            text = URLEncoder.encode(text, "utf-8");
            num = URLEncoder.encode(num, "utf-8");
            Misc misc=new Misc();
            String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/stock/support/text/" + text + "/number/" + num;
            Log.i("ddd", num);
            // String URL="http://10.0.2.2/repair/index.php/stock/support/text/"+text;
            int BUFFER_SIZE = 2000;
            InputStream in = null;
            try {
                in = OpenHttpConnection(URL);
            } catch (IOException e1) {
                e1.printStackTrace();
                return "";
            }
            if (in != null) {
                InputStreamReader isr = new InputStreamReader(in);
                int charRead;

                char[] inputBuffer = new char[BUFFER_SIZE];
                try {
                    while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                        String readString =
                                String.copyValueOf(inputBuffer, 0, charRead);
                        str += readString;
                        inputBuffer = new char[BUFFER_SIZE];
                    }
                    in.close();
                } catch (IOException e) {
                    //Toast.makeText(this, e.getLocalizedMessage(),Toast.LENGTH_LONG).show();
                    e.printStackTrace();
                    return "";
                }
            } else {
                str = "NO_CONNECTION";
            }

        }

        //}
        catch (Exception ex) {

            Log.i("Error", ex.toString());
        }

        return str;

    }

    public String getTicket(String id) {
        Misc misc=new Misc();
        String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/stock/ticket/id/" + id;
        int BUFFER_SIZE = 2000;
        InputStream in = null;
        String str = "";
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            //Toast.makeText(this, e1.getLocalizedMessage(),Toast.LENGTH_LONG).show();
            e1.printStackTrace();
            return "";
        }
        if (in != null) {
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;

            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                    String readString =
                            String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                //Toast.makeText(this, e.getLocalizedMessage(),Toast.LENGTH_LONG).show();
                e.printStackTrace();
                return "";
            }
        } else {
            str = "NO_CONNECTION";
        }
        return str;
    }

    public String getTickets(String id) {
        Misc misc=new Misc();
        String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/stock/tickets/id/"+id;
        int BUFFER_SIZE = 2000;
        String str = "";
        InputStream in = null;
        try {
            in = OpenHttpConnection(URL);
        } catch (IOException e1) {
            e1.printStackTrace();
            return "";
        }
        if (in != null) {
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;

            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {
//---convert the chars to a String---
                    String readString =
                            String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                e.printStackTrace();
                return "";
            }
        } else {
            str = "NO_CONNECTION";

        }
        return str;
    }

    public void setProblem(String problem,String number,String id)
    {
        String str="";
        try {
            problem = URLEncoder.encode(problem, "utf-8");
            number = URLEncoder.encode(number, "utf-8");
            id= URLEncoder.encode(id, "utf-8");
            Misc misc=new Misc();
            String URL = "http://"+misc.baseUrl(HomeActivity.get_context())+"/repair/index.php/stock/doneapp/text/" + problem + "/number/" + number+"/id/"+id;
            Log.i("ddd", number);
            int BUFFER_SIZE = 2000;
            InputStream in = null;
            try {
                in = OpenHttpConnection(URL);
            } catch (IOException e1) {
                e1.printStackTrace();

            }
            if (in != null) {
                InputStreamReader isr = new InputStreamReader(in);
                int charRead;

                char[] inputBuffer = new char[BUFFER_SIZE];
                try {
                    while ((charRead = isr.read(inputBuffer)) > 0) {
                        String readString =
                                String.copyValueOf(inputBuffer, 0, charRead);
                        str += readString;
                        inputBuffer = new char[BUFFER_SIZE];
                    }
                    in.close();
                } catch (IOException e) {
                        e.printStackTrace();

                }
            } else {
                str = "NO_CONNECTION";
            }

        }

        //}
        catch (Exception ex) {

            Log.i("Error", ex.toString());
        }




    }
}
