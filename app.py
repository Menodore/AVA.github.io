from flask import Flask, request, jsonify
import pandas as pd
from sklearn.tree import DecisionTreeClassifier
from sklearn.model_selection import train_test_split

app = Flask(__name__)

# Load and train the model
data = pd.read_csv('period.csv')
data.drop(['Height', 'Income'], axis=1, inplace=True)
data['Unusual_Bleeding'] = data['Unusual_Bleeding'].map({'no': 0, 'yes': 1})
data['Menses_score_binary'] = data['Menses_score'].apply(lambda x: 1 if x >= 4 else 0)
data.drop('Menses_score', axis=1, inplace=True)

features = ['Length_of_cycle', 'Length_of_menses', 'Weight', 'BMI', 'Unusual_Bleeding']
target = 'Menses_score_binary'

X = data[features]
y = data[target]

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

clf = DecisionTreeClassifier(random_state=42)
clf.fit(X_train, y_train)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    length_of_cycle = float(data['length_of_cycle'])
    length_of_menses = float(data['length_of_menses'])
    weight = float(data['weight'])
    height = float(data['height'])
    unusual_bleeding = 1 if data['unusual_bleeding'].lower() == 'yes' else 0

    bmi = weight / (height / 100) ** 2
    input_data = [[length_of_cycle, length_of_menses, weight, bmi, unusual_bleeding]]
    prediction = clf.predict(input_data)[0]

    return jsonify({'prediction': 'Higher Symptoms' if prediction == 1 else 'Lower Symptoms'})

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')

